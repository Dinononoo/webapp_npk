<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\SensorData;
use App\Models\Sensor;

class NPKController extends Controller
{
    public function show(Request $request)
    {
        // ตรวจสอบว่ามี session_token อยู่หรือไม่ ถ้าไม่มีแสดงว่าหน้าเพิ่งถูกเปิดใหม่ให้รีเซ็ตข้อมูล
        if (!Session::has('session_token')) {
            Session::put('session_token', bin2hex(random_bytes(16))); // สร้าง session_token ใหม่
        }

        // รับ sensorId จากพารามิเตอร์ใน URL และแปลงให้เป็น 2 หลัก
        $sensorId = $request->query('sensorId');
        $sensorIdFormatted = str_pad($sensorId, 2, '0', STR_PAD_LEFT); // แปลงเป็น 2 หลัก เช่น "02"

        // ตรวจสอบว่า sensor_id นี้มีในตาราง sensors หรือไม่
        $sensor = Sensor::where('sensor_id', $sensorIdFormatted)->first();

        // ถ้าไม่มี sensorId นี้ในตาราง sensors ให้แสดง error
        if (!$sensor) {
            return response()->json(['error' => 'Sensor ID does not exist in the sensors table'], 400);
        }

        // ข้อมูลที่ได้รับจาก Request
        $N = $request->query('N');
        $P = $request->query('P');
        $K = $request->query('K');
        $PH = $request->query('PH');

        // รับค่า latitude และ longitude
        $lat = $request->query('lat');
        $log = $request->query('log') ?? $request->query('lng');

        $userId = Auth::id();
        $sessionToken = Session::get('session_token'); // ดึง session_token ปัจจุบัน

        // อ่านข้อมูลจากเซสชัน ถ้ามี
        $dataPoints = Session::get('sensorData', []);

        // คำนวณจำนวนจุดวัดปัจจุบัน
        $currentIndex = count($dataPoints) + 1;

        // บันทึกข้อมูลลงในฐานข้อมูล
        if ($sensorId && $N && $P && $K && $PH && $lat && $log) {
            $sensorData = SensorData::create([
                'user_id' => $userId ? $userId : null,
                'session_token' => $sessionToken,
                'sensor_id' => $sensor->id, // ใช้ sensor->id จากตาราง sensors
                'N' => $N,
                'P' => $P,
                'K' => $K,
                'PH' => $PH,
                'latitude' => $lat,
                'longitude' => $log,
            ]);

            // เพิ่มข้อมูลใหม่ใน array dataPoints และระบุลำดับจุด
            $dataPoints[] = [
                'index' => $currentIndex,
                'sensor_id' => $sensor->sensor_id, // ใช้ sensor->sensor_id เพื่อแสดงในหน้าเว็บ
                'N' => $N,
                'P' => $P,
                'K' => $K,
                'PH' => $PH,
                'latitude' => $lat,
                'longitude' => $log,
                'map_link' => 'https://www.google.com/maps?q=' . $lat . ',' . $log,
                'id' => $sensorData->id,
            ];

            // บันทึกข้อมูลลงในเซสชัน
            Session::put('sensorData', $dataPoints);
        }

        // คำนวณค่าเฉลี่ย
        $averages = $this->calculateAverages($dataPoints);

        return view('user.npk', compact('dataPoints', 'averages'));
    }

    public function deletePoint(Request $request, $index)
    {
        // อ่านข้อมูลจากเซสชัน
        $dataPoints = Session::get('sensorData', []);

        // ลบข้อมูลที่ตำแหน่งที่ระบุในเซสชันและฐานข้อมูล
        if (isset($dataPoints[$index])) {
            $dataPoint = $dataPoints[$index];
            unset($dataPoints[$index]);
            $dataPoints = array_values($dataPoints); // จัดเรียงใหม่หลังจากลบ
            Session::put('sensorData', $dataPoints);

            // ลบข้อมูลจากฐานข้อมูลโดยใช้ id
            if (isset($dataPoint['id'])) {
                SensorData::where('id', $dataPoint['id'])->delete();
            }
        }

        // คำนวณค่าเฉลี่ยใหม่
        $averages = $this->calculateAverages($dataPoints);

        return view('user.npk', compact('dataPoints', 'averages'));
    }

    public function updateUserId()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            SensorData::where('user_id', null)->update(['user_id' => $userId]);
        }
        
        return redirect()->route('npk.show'); 
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
}
