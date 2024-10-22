<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPlant extends Model
{
    use HasFactory;

    protected $fillable = ['plant_id', 'sub_plant_name'];

    // Relationship กับ Plant
    public function plant()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }

    // Relationship กับ Stage
    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
