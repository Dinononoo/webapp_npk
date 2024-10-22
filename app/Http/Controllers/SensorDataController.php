<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\SensorData;

class SensorDataController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // ดึง session_token ล่าสุดของผู้ใช้
        $sessionToken = SensorData::where('user_id', $userId)
                                ->orderBy('created_at', 'desc')
                                ->pluck('session_token')
                                ->first();

        // ดึงข้อมูลจากฐานข้อมูลตาม user_id และ session_token ของผู้ใช้ที่ล็อกอิน
        $dataPoints = SensorData::where('user_id', $userId)
                                ->where('session_token', $sessionToken)
                                ->orderBy('created_at', 'asc')
                                ->get()
                                ->toArray();

        if (empty($dataPoints)) {
            // กรณีที่ไม่มีข้อมูลในฐานข้อมูล ให้ดึงข้อมูลจาก session
            $dataPoints = Session::get('sensorData', []);
        }

        $averages = $this->calculateAverages($dataPoints);

        return view('user.fertilizer.formula', compact('dataPoints', 'averages'));
    }

    private function calculateAverages($dataPoints)
    {
        $totals = ['N' => 0, 'P' => 0, 'K' => 0, 'PH' => 0];
        $count = count($dataPoints);

        foreach ($dataPoints as $point) {
            $totals['N'] += is_array($point) ? $point['N'] : $point->N;
            $totals['P'] += is_array($point) ? $point['P'] : $point->P;
            $totals['K'] += is_array($point) ? $point['K'] : $point->K;
            $totals['PH'] += is_array($point) ? $point['PH'] : $point->PH;
        }

        return [
            'averageN' => $count > 0 ? $totals['N'] / $count : 0,
            'averageP' => $count > 0 ? $totals['P'] / $count : 0,
            'averageK' => $count > 0 ? $totals['K'] / $count : 0,
            'averagePH' => $count > 0 ? $totals['PH'] / $count : 0,
        ];
    }
}
