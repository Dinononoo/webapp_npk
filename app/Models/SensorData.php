<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_token',
        'sensor_id',
        'N',
        'P',
        'K',
        'PH',
        'latitude',  // เพิ่มฟิลด์ latitude
        'longitude', // เพิ่มฟิลด์ longitude
    ];

    public $timestamps = true;

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
