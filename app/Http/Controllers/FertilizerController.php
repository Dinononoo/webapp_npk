<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use App\Models\Stage;
use App\Models\SensorData;
use App\Models\SubPlant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\FertilizerSuggestion;
use App\Models\FertilizerCalculationHistoryV2;

class FertilizerController extends Controller
{

    public function showFormula()
    {
        $user_id = auth()->id();
        $sessionToken = SensorData::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->pluck('session_token')
            ->first();

        // ตรวจสอบว่ามี sessionToken หรือไม่
        if (!$sessionToken) {
            return view('user.fertilizer.formula', ['dataPoints' => [], 'averages' => null]);
        }

        // ดึงข้อมูลจากเซ็นเซอร์ พร้อมกับ sensor_id
        $dataPoints = SensorData::where('user_id', $user_id)
            ->where('session_token', $sessionToken)
            ->orderBy('created_at', 'asc')
            ->with('sensor') // ดึงข้อมูลความสัมพันธ์ของ sensor
            ->get()
            ->toArray();

        if (empty($dataPoints)) {
            return view('user.fertilizer.formula', ['dataPoints' => [], 'averages' => null]);
        }

        $averages = $this->calculateAverages($dataPoints);

        // ส่งข้อมูลไปยัง View
        return view('user.fertilizer.formula', compact('dataPoints', 'averages'));
    }

    public function destroy($id)
    {
        // ค้นหา SensorData โดยใช้ ID
        $sensorData = SensorData::find($id);

        if ($sensorData) {
            // ลบข้อมูลที่ค้นหาเจอ
            $sensorData->delete();

            // ตรวจสอบว่ามีข้อมูลเหลืออยู่หรือไม่
            $user_id = auth()->id();
            $sessionToken = SensorData::where('user_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->pluck('session_token')
                ->first();

            $remainingData = SensorData::where('user_id', $user_id)
                ->where('session_token', $sessionToken)
                ->count();

            // ถ้าไม่มีข้อมูลเหลืออยู่ให้ลบ sessionData ออก
            if ($remainingData == 0) {
                session()->flash('message', 'ไม่มีข้อมูลการวัดจากเซ็นเซอร์');
            }
        }

        // ทำการ redirect ไปยังหน้าอื่นหลังจากลบเสร็จ โดยไม่ต้องแสดงข้อมูลเก่า
        return redirect()->route('fertilizer.formula');
    }



    public function plantSelection()
    {
        $plants = Plant::all();
        return view('user.fertilizer.plantSelection', compact('plants'));
    }



    public function subPlantSelection(Request $request)
    {
        $plant_id = $request->input('plant_id');
        $plant_name = $request->input('plant_name');
        $sub_plants = SubPlant::where('plant_id', $plant_id)->get();
        return view('user.fertilizer.subPlantSelection', compact('sub_plants', 'plant_id', 'plant_name'));
    }

    public function stageSelection(Request $request)
    {
        $plant_id = $request->input('plant_id');
        $sub_plant_id = $request->input('sub_plant_id');
        $plant_name = $request->input('plant_name');
        $sub_plant_name = $request->input('sub_plant_name');

        $stages = Stage::where('plant_id', $plant_id)
            ->when($sub_plant_id, function ($query) use ($sub_plant_id) {
                return $query->where('sub_plant_id', $sub_plant_id);
            })
            ->get();

        return view('user.fertilizer.stageSelection', compact('stages', 'plant_id', 'plant_name', 'sub_plant_name', 'sub_plant_id'));
    }

    public function showCalculationForm(Request $request)
    {
        // ดึงข้อมูลที่เกี่ยวข้อง
        $plant_id = $request->input('plant_id');
        $stage_id = $request->input('stage_id');
        $sub_plant_id = $request->input('sub_plant_id');
        $plant_name = Plant::find($plant_id)->name; // ดึงชื่อพืชจาก Plant Model

        // ดึงข้อมูล stage
        $stage = Stage::find($stage_id);
        $stage_name = $stage ? $stage->name : 'Unknown Stage'; // ดึงชื่อของ stage หรือกำหนดค่าเริ่มต้นถ้าไม่พบ

        // ดึงข้อมูลจาก SensorData
        $user_id = auth()->id();
        $sessionToken = SensorData::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->pluck('session_token')
            ->first();

        $dataPoints = SensorData::where('user_id', $user_id)
            ->where('session_token', $sessionToken)
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();

        if (empty($dataPoints)) {
            return back()->with('error', 'ไม่พบข้อมูลการวัดจากเซ็นเซอร์');
        }

        // คำนวณค่าเฉลี่ยจากข้อมูลเซ็นเซอร์
        $averages = $this->calculateAverages($dataPoints);

        // แปลงค่า N เป็น OM
        $om = $this->convertNtoOM($averages['averageN']);
        $p = $averages['averageP'];
        $k = $averages['averageK'];

        // คำนวณค่า NPK ที่เหมาะสม
        $recommendedNPK = $this->getRecommendedNPK($om, $p, $k, $plant_id, $sub_plant_id);

        // ตรวจสอบในตาราง fertilizer_suggestions
        $fertilizerSuggestion = FertilizerSuggestion::where('plant_id', $plant_id)
            ->where('sub_plant_id', $sub_plant_id)
            ->where('stage_id', $stage_id)
            ->where('recommended_n', $recommendedNPK['n'])
            ->where('recommended_p', $recommendedNPK['p'])
            ->where('recommended_k', $recommendedNPK['k'])
            ->first();

        if (!$fertilizerSuggestion) {
            return back()->with('error', 'ไม่พบคำแนะนำที่ตรงกับข้อมูลที่วัดได้');
        }

        // ส่งข้อมูลไปยัง View
        return view('user.fertilizer.calculate', [
            'stage_name' => $stage_name,  // เพิ่มตัวแปร stage_name ที่ส่งไปยัง View
            'plant_name' => $plant_name,
            'plant_id' => $plant_id,
            'sub_plant_id' => $sub_plant_id,
            'stage_id' => $stage_id,
            'averages' => $averages,
            'recommendedNPK' => $recommendedNPK
        ]);
    }

    private function convertNtoOM($n_value)
    {
        return $n_value / 556;
    }

    private function getRecommendedNPK($om, $p, $k, $plant_id, $sub_plant_id)
    {

        $recommendedNPK = [];

        // เกณฑ์สำหรับมันสำปะหลัง (plant_id = 1)
        if ($plant_id == 1) {
            if ($om < 0.60) {
                $recommendedNPK['n'] = 16;
            } elseif ($om < 1.00) {
                $recommendedNPK['n'] = 16;
            } elseif ($om < 2.00) {
                $recommendedNPK['n'] = 8;
            } else {
                $recommendedNPK['n'] = 4;
            }

            if ($p < 5) {
                $recommendedNPK['p'] = 8;
            } elseif ($p < 30) {
                $recommendedNPK['p'] = 4;
            } else {
                $recommendedNPK['p'] = 2;
            }

            if ($k < 30) {
                $recommendedNPK['k'] = 16;
            } elseif ($k < 90) {
                $recommendedNPK['k'] = 8;
            } else {
                $recommendedNPK['k'] = 4;
            }
        }
        // เกณฑ์สำหรับข้าวโพด (plant_id = 2)
        elseif ($plant_id == 2) {
            if ($sub_plant_id == 1) { // ข้าวโพดเลี้ยงสัตว์
                if ($om < 1) {
                    $recommendedNPK['n'] = 15;
                } elseif ($om < 2) {
                    $recommendedNPK['n'] = 10;
                } else {
                    $recommendedNPK['n'] = 5;
                }

                if ($p < 10) {
                    $recommendedNPK['p'] = 10;
                } elseif ($p < 15) {
                    $recommendedNPK['p'] = 5;
                } else {
                    $recommendedNPK['p'] = 2.5;
                }

                if ($k < 60) {
                    $recommendedNPK['k'] = 15;
                } elseif ($k < 100) {
                    $recommendedNPK['k'] = 10;
                } else {
                    $recommendedNPK['k'] = 5;
                }
            } elseif ($sub_plant_id == 2) { // ข้าวโพดฝักสด
                if ($om < 1) {
                    $recommendedNPK['n'] = 30;
                } elseif ($om < 2) {
                    $recommendedNPK['n'] = 20;
                } else {
                    $recommendedNPK['n'] = 15;
                }

                if ($p < 10) {
                    $recommendedNPK['p'] = 10;
                } elseif ($p < 15) {
                    $recommendedNPK['p'] = 8;
                } else {
                    $recommendedNPK['p'] = 6;
                }

                if ($k < 60) {
                    $recommendedNPK['k'] = 20;
                } elseif ($k < 100) {
                    $recommendedNPK['k'] = 15;
                } else {
                    $recommendedNPK['k'] = 10;
                }
            }
        }
        // เกณฑ์สำหรับอ้อย (plant_id = 3)
        elseif ($plant_id == 3) {
            if ($sub_plant_id == 3) { // อ้อยปลูก
                if ($om < 0.75) {
                    $recommendedNPK['n'] = 27;
                } elseif ($om < 1.50) {
                    $recommendedNPK['n'] = 15;
                } elseif ($om < 2.25) {
                    $recommendedNPK['n'] = 12;
                } else {
                    $recommendedNPK['n'] = 6;
                }

                if ($p < 7) {
                    $recommendedNPK['p'] = 9;
                } elseif ($p < 30) {
                    $recommendedNPK['p'] = 6;
                } else {
                    $recommendedNPK['p'] = 3;
                }

                if ($k < 60) {
                    $recommendedNPK['k'] = 18;
                } elseif ($k < 90) {
                    $recommendedNPK['k'] = 12;
                } else {
                    $recommendedNPK['k'] = 6;
                }
            } elseif ($sub_plant_id == 4) { // อ้อยตอ
                if ($om < 0.75) {
                    $recommendedNPK['n'] = 27;
                } elseif ($om < 1.50) {
                    $recommendedNPK['n'] = 18;
                } elseif ($om < 2.25) {
                    $recommendedNPK['n'] = 15;
                } else {
                    $recommendedNPK['n'] = 9;
                }

                if ($p < 7) {
                    $recommendedNPK['p'] = 9;
                } elseif ($p < 30) {
                    $recommendedNPK['p'] = 6;
                } else {
                    $recommendedNPK['p'] = 3;
                }

                if ($k < 60) {
                    $recommendedNPK['k'] = 18;
                } elseif ($k < 90) {
                    $recommendedNPK['k'] = 12;
                } else {
                    $recommendedNPK['k'] = 6;
                }
            }
        }

        // ตรวจสอบการคืนค่าในรูปแบบที่ถูกต้อง
        if (empty($recommendedNPK)) {
            Log::error('ไม่สามารถคำนวณ NPK ได้สำหรับ plant_id ' . $plant_id . ' และ sub_plant_id ' . $sub_plant_id);
            return null; // หรือคืนค่าผลลัพธ์ที่เหมาะสมถ้าต้องการ
        }

        return $recommendedNPK;
    }

    private function calculateAverages($dataPoints)
    {
        $totals = ['N' => 0, 'P' => 0, 'K' => 0, 'PH' => 0];
        $count = count($dataPoints);

        foreach ($dataPoints as $point) {
            $totals['N'] += $point['N'];
            $totals['P'] += $point['P'];
            $totals['K'] += $point['K'];
            $totals['PH'] += $point['PH'];
        }

        return [
            'averageN' => $count > 0 ? $totals['N'] / $count : 0,
            'averageP' => $count > 0 ? $totals['P'] / $count : 0,
            'averageK' => $count > 0 ? $totals['K'] / $count : 0,
            'averagePH' => $count > 0 ? $totals['PH'] / $count : 0,
        ];
    }

    public function recommend(Request $request)
    {
        // ตรวจสอบว่าได้รับค่าจากฟอร์มครบหรือไม่
        $validatedData = $request->validate([
            'recommendedN' => 'required|numeric',
            'recommendedP' => 'required|numeric',
            'recommendedK' => 'required|numeric',
            'plant_id' => 'required|integer',
            'sub_plant_id' => 'nullable|integer',
            'stage_id' => 'required|integer',
            'averageN' => 'required|numeric',
            'averageP' => 'required|numeric',
            'averageK' => 'required|numeric'
        ]);

        // ค้นหาคำแนะนำปุ๋ยในตาราง fertilizer_suggestions
        $fertilizerSuggestion = FertilizerSuggestion::where('plant_id', $validatedData['plant_id'])
            ->where('sub_plant_id', $validatedData['sub_plant_id'])
            ->where('stage_id', $validatedData['stage_id'])
            ->where('recommended_n', $validatedData['recommendedN'])
            ->where('recommended_p', $validatedData['recommendedP'])
            ->where('recommended_k', $validatedData['recommendedK'])
            ->first();

        if (!$fertilizerSuggestion) {
            return response()->json(['message' => 'ไม่พบคำแนะนำที่ตรงกับข้อมูลที่วัดได้'], 404);
        }

        // บันทึกข้อมูลการคำนวณลงในฐานข้อมูล
        FertilizerCalculationHistoryV2::create([
            'user_id' => auth()->id(),
            'plant_id' => $validatedData['plant_id'],
            'sub_plant_id' => $validatedData['sub_plant_id'],
            'stage_id' => $validatedData['stage_id'],
            'average_n' => $validatedData['averageN'],
            'average_p' => $validatedData['averageP'],
            'average_k' => $validatedData['averageK'],
            'npk_recommendation' => json_encode([
                'n' => $validatedData['recommendedN'],
                'p' => $validatedData['recommendedP'],
                'k' => $validatedData['recommendedK']
            ]),
            'fertilizer_mix' => json_encode([
                'fertilizer_46_0_0' => $fertilizerSuggestion->fertilizer_46_0_0,
                'fertilizer_18_46_0' => $fertilizerSuggestion->fertilizer_18_46_0,
                'fertilizer_0_0_60' => $fertilizerSuggestion->fertilizer_0_0_60
            ]),
            'calculation_method' => 'NPK sensor',
        ]);

        // ส่งผลลัพธ์กลับไปยังหน้าผลลัพธ์
        return response()->json([
            'fertilizer_46_0_0' => $fertilizerSuggestion->fertilizer_46_0_0,
            'fertilizer_18_46_0' => $fertilizerSuggestion->fertilizer_18_46_0,
            'fertilizer_0_0_60' => $fertilizerSuggestion->fertilizer_0_0_60,
        ]);
    }

    public function showSensorHistory()
    {
        $user_id = auth()->id(); // ดึง user id ของผู้ใช้ที่ล็อกอินอยู่


        // ดึงข้อมูลประวัติการคำนวณจากเซ็นเซอร์ NPK เฉพาะของผู้ใช้ที่ล็อกอิน
        $sensorHistories = FertilizerCalculationHistoryV2::where('user_id', $user_id)
            ->whereNotNull('npk_recommendation')
            ->with(['plant', 'subPlant', 'stage']) // เพิ่มการดึงข้อมูล plant, subPlant, และ stage
            ->paginate(10); // แบ่งหน้า

        

        return view('user.fertilizer.sensor_history', compact('sensorHistories'));
    }

    public function showResult(Request $request)
    {
        // ดึงข้อมูลที่จำเป็นจาก request และตรวจสอบค่า null
        $fertilizer46 = $request->input('fertilizer_46_0_0') !== 'null' ? $request->input('fertilizer_46_0_0') : 0;
        $fertilizer18 = $request->input('fertilizer_18_46_0') !== 'null' ? $request->input('fertilizer_18_46_0') : 0;
        $fertilizer60 = $request->input('fertilizer_0_0_60') !== 'null' ? $request->input('fertilizer_0_0_60') : 0;
        $plantId = $request->input('plant_id');
        $stageId = $request->input('stage_id');
        $subPlantId = $request->input('sub_plant_id');

        // ส่งข้อมูลไปยัง view สำหรับแสดงผลลัพธ์
        return view('user.fertilizer.result', [
            'fertilizer_46_0_0' => $fertilizer46,
            'fertilizer_18_46_0' => $fertilizer18,
            'fertilizer_0_0_60' => $fertilizer60,
            'plant_id' => $plantId,
            'stage_id' => $stageId,
            'sub_plant_id' => $subPlantId,
        ]);
    }

    
}
