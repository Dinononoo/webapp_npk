<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FertilizerCalculationHistoryV2 extends Model
{
    use HasFactory;

    protected $table = 'fertilizer_calculation_histories_v2';

    protected $fillable = [
        'user_id',
        'plant_id',
        'sub_plant_id',
        'stage_id',
        'npk_recommendation',
        'fertilizer_mix',
        'average_n',
        'average_p',
        'average_k',
        'fertilizer_weight',
        'calculation_method',
        'latitude',
        'longitude',
        'custom_formula_input',
    ];
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

}
