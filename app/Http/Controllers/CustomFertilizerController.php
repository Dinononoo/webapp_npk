<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FertilizerCalculationHistoryV2;

class CustomFertilizerController extends Controller
{
    // แสดงฟอร์มให้ผู้ใช้กรอกสูตรปุ๋ยเอง
    public function showForm()
    {
        return view('user.custom_fertilizer.custom_fertilizer');
    }

    // ประมวลผลการคำนวณสูตรปุ๋ยที่ผู้ใช้กรอก
    public function calculate(Request $request)
    {
        $n_diff = $request->input('nitrogen');
        $p_diff = $request->input('phosphorus');
        $k_diff = $request->input('potassium');
        $total_weight = $request->input('weight');
        
        // คำนวณสูตรปุ๋ยที่เหมาะสม
        $fertilizer_mix = $this->calculate_fertilizer_mix($n_diff, $p_diff, $k_diff, $total_weight);
        
        // บันทึกข้อมูลลงในฐานข้อมูล โดยบันทึกข้อมูลจากสูตรปุ๋ยที่กรอกในคอลัมน์ custom_formula_input
        FertilizerCalculationHistoryV2::create([
            'user_id' => auth()->id(), // รหัสผู้ใช้งานที่ล็อกอินอยู่
            'custom_formula_input' => json_encode(['N' => $n_diff, 'P' => $p_diff, 'K' => $k_diff]), // แปลงข้อมูลเป็น JSON เพื่อบันทึกในคอลัมน์ custom_formula_input
            'fertilizer_weight' => $total_weight, // น้ำหนักปุ๋ย
            'calculation_method' => json_encode($fertilizer_mix), // บันทึกสูตรปุ๋ยที่คำนวณได้ในคอลัมน์ calculation_method
            'created_at' => now(), // วันที่และเวลาที่คำนวณ
            'updated_at' => now(), // วันที่และเวลาที่ข้อมูลถูกอัปเดต
        ]);
        
        // ส่งผลลัพธ์ไปยังหน้าผลลัพธ์
        return view('user.custom_fertilizer.custom_fertilizer_result', compact('fertilizer_mix', 'total_weight'));
    }
    
    private function calculate_fertilizer_mix($n_diff, $p_diff, $k_diff, $total_weight)
    {
        $urea = ["N" => 46, "P" => 0, "K" => 0];
        $dap = ["N" => 18, "P" => 46, "K" => 0];
        $mop = ["N" => 0, "P" => 0, "K" => 60];

        // คำนวณน้ำหนักปุ๋ยแต่ละชนิด
        $mop_weight = ($k_diff * $total_weight) / $mop["K"];
        $dap_weight = ($p_diff * $total_weight) / $dap["P"];
        $nitrogen_from_dap = ($dap_weight * $dap["N"]) / $total_weight;
        $urea_weight = (($n_diff - $nitrogen_from_dap) * $total_weight) / $urea["N"];

        // ตรวจสอบว่า $urea_weight ไม่ติดลบ
        $urea_weight = max(0, $urea_weight);

        // คำนวณน้ำหนักรวมของปุ๋ยทั้งหมด
        $total_mother_fertilizer_weight = $urea_weight + $dap_weight + $mop_weight;

        // คำนวณฟิลเลอร์
        $filler_weight = max(0, $total_weight - $total_mother_fertilizer_weight);

        return [
            "urea" => round($urea_weight),
            "dap" => round($dap_weight),
            "mop" => round($mop_weight),
            "filler" => round($filler_weight)
        ];
    }

    public function storeCustomFertilizerResult(Request $request)
    {
        $customFormula = $request->input('custom_formula');
        $customWeight = $request->input('custom_weight');
        $areaSize = $request->input('area_size');
    
        // บันทึกลงฐานข้อมูล
        FertilizerCalculationHistoryV2::create([
            'user_id' => auth()->id(),
            'custom_formula' => $customFormula,
            'custom_weight' => $customWeight,
            'area_size' => $areaSize,
            'calculated_at' => now(),
        ]);
    
        // ส่งกลับไปยังหน้าผลลัพธ์
        return view('user.custom_fertilizer.custom_fertilizer_result', compact('customFormula', 'customWeight', 'areaSize'));
    }


    public function customHistory()
    {
        // ดึงข้อมูลประวัติการคำนวณเฉพาะสูตรปุ๋ยที่ผู้ใช้กรอกด้วยตัวเอง (custom_formula_input ไม่เป็น null)
        $customHistories = FertilizerCalculationHistoryV2::where('user_id', auth()->id())
            ->whereNotNull('custom_formula_input') // เงื่อนไขในการกรองข้อมูลที่เป็นการคำนวณด้วยตัวเอง
            ->paginate(10);
        
        // ส่งข้อมูลไปยัง view
        return view('user.custom_fertilizer.custom_history', compact('customHistories'));
    }
    
    

    

    
}
