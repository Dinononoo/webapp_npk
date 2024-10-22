<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerCalculationHistory extends Model
{
    use HasFactory;

    protected $table = 'fertilizer_calculation_histories';

    // ระบุคอลัมน์ที่สามารถ mass assign ได้
    protected $fillable = [
        'user_id',
        'plant_id',
        'sub_plant_id',
        'stage_id',
        'npk_recommendation',
        'fertilizer_mix',
        'ph_min',
        'ph_max',
        'ph_recommendation',
        'average_n',
        'average_p',
        'average_k',
        'average_ph',
        'fertilizer_weight',
        'latitude',  // เพิ่มฟิลด์ละติจูด
        'longitude', // เพิ่มฟิลด์ลองจิจูด
    ];

    // หากมีความสัมพันธ์กับ Model อื่น ๆ คุณสามารถระบุได้ที่นี่
    // ตัวอย่างการเชื่อมโยงกับ Model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
    
    public function subPlant()
    {
        return $this->belongsTo(SubPlant::class, 'sub_plant_id');
    }
    
    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

}
