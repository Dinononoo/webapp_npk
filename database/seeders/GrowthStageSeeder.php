<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stage;

class GrowthStageSeeder extends Seeder
{
    public function run()
    {
        // ข้อมูลสำหรับมันสำปะหลัง (ไม่มี sub-plant)
        Stage::create([
            'plant_id' => 1,  // ID ของมันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_name' => 'ช่วง 1-2 เดือน',
        ]);

        // ข้อมูลสำหรับข้าวโพด (มี sub-plant)
        Stage::create([
            'plant_id' => 2,  // ID ของข้าวโพด
            'sub_plant_id' => 1,  // ID ของ sub-plant เช่น ข้าวโพดเลี้ยงสัตว์
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)',
        ]);

        Stage::create([
            'plant_id' => 2,  
            'sub_plant_id' => 1,  
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)',
        ]);

        Stage::create([
            'plant_id' => 2,  
            'sub_plant_id' => 2,  // ID ของ sub-plant เช่น ข้าวโพดหวาน
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)',
        ]);

        Stage::create([
            'plant_id' => 2,  
            'sub_plant_id' => 2,  
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 2 (อายุ 30 วัน)',
        ]);

        // ข้อมูลสำหรับอ้อย (มี sub-plant)
        Stage::create([
            'plant_id' => 3,  // ID ของอ้อย
            'sub_plant_id' => 3,  // ID ของ sub-plant เช่น อ้อยตอ
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)',
        ]);

        Stage::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)',
        ]);

        Stage::create([
            'plant_id' => 3,  
            'sub_plant_id' => 4,  // ID ของ sub-plant เช่น อ้อยปลูก
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)',
        ]);

        Stage::create([
            'plant_id' => 3,  
            'sub_plant_id' => 4,  
            'stage_name' => 'ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)',
        ]);
    }
}
