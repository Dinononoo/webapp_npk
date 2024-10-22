<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantSeeder extends Seeder
{
    public function run()
    {
        // เพิ่มข้อมูลใหม่
        Plant::create(['plant_name' => 'มันสำปะหลัง']);
        Plant::create(['plant_name' => 'ข้าวโพด']);
        Plant::create(['plant_name' => 'อ้อย']);
    }
}
