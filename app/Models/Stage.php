<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'growth_stages'; // ระบุชื่อตารางที่ถูกต้อง

    protected $fillable = [
        'plant_id', 'sub_plant_id', 'stage_name'
    ];

    // Relationship กับ Plant
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    // Relationship กับ SubPlant (nullable)
    public function subPlant()
    {
        return $this->belongsTo(SubPlant::class);
    }

    public function fertilizerCalculationHistories()
    {
        return $this->hasMany(FertilizerCalculationHistoryV2::class, 'stage_id');
    }
    

}
