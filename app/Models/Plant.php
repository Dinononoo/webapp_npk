<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table = 'plant_types'; // ระบุชื่อตารางที่ถูกต้อง

    protected $fillable = ['plant_name'];

    public function subPlants()
    {
        return $this->hasMany(SubPlant::class);
    }
}
