<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerSuggestion extends Model
{
    use HasFactory;

    // กำหนด columns ที่สามารถบันทึกลง database ได้
    protected $fillable = [
        'plant_id',
        'sub_plant_id',
        'stage_id',
        'recommended_n',
        'recommended_p',
        'recommended_k',
        'fertilizer_46_0_0',
        'fertilizer_18_46_0',
        'fertilizer_0_0_60'
    ];

    // ความสัมพันธ์กับตาราง PlantType (พืชหลัก)
    public function plantType()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    // ความสัมพันธ์กับตาราง SubPlant (ชนิดของพืช)
    public function subPlant()
    {
        return $this->belongsTo(SubPlant::class, 'sub_plant_id');
    }

    // ความสัมพันธ์กับตาราง GrowthStage (ระยะการเจริญเติบโต)
    public function growthStage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    
}
