<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SubPlant;

class SubPlantSeeder extends Seeder
{
    public function run()
    {
        // ข้อมูลสำหรับข้าวโพด
        SubPlant::create([
            'plant_id' => 2,  // ID ของข้าวโพด
            'sub_plant_name' => 'ข้าวโพดเลี้ยงสัตว์',
        ]);

        SubPlant::create([
            'plant_id' => 2, 
            'sub_plant_name' => 'ข้าวโพดฝักสด (ข้าวโพดหวาน ข้าวโพดข้าวเหนียว และข้าวโพดฝักอ่อน)',
        ]);

        // ข้อมูลสำหรับอ้อย
        SubPlant::create([
            'plant_id' => 3,  // ID ของอ้อย
            'sub_plant_name' => 'อ้อยปลูก',
        ]);

        SubPlant::create([
            'plant_id' => 3, 
            'sub_plant_name' => 'อ้อยตอ',
        ]);

    }
}
