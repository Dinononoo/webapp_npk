<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FertilizerSuggestion;

class FertilizerSuggestionsSeeder extends Seeder
{
    public function run()
    {
        // ข้อมูลสำหรับมันสำปะหลังในระยะต่าง ๆ ตามตาราง

        // < 0.6% OM, P < 5, K < 30
        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,  // ระยะการเจริญเติบโตที่กำหนด
            'recommended_n' => 16,
            'recommended_p' => 8,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 27,
        ]);

        // < 0.6% OM, P 5-30, K 30-90
        FertilizerSuggestion::create([
            'plant_id' => 1,
            'sub_plant_id' => null,
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 8,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 8,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 7,
        ]);
        
        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 4,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 31,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 4,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 31,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 4,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 31,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 2,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 33,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 2,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 33,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 13,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 16,
            'recommended_p' => 2,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 33,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 8,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 8,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 8,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 4,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 4,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 4,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 2,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 2,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 8,
            'recommended_p' => 2,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 8,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 8,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 8,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 17,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 4,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 4,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 4,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 9,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 2,
            'recommended_k' => 16,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 27,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 2,
            'recommended_k' => 8,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 13,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 1,  // มันสำปะหลัง
            'sub_plant_id' => null,  // ไม่มี sub-plant
            'stage_id' => 1,
            'recommended_n' => 4,
            'recommended_p' => 2,
            'recommended_k' => 4,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 4,
            'fertilizer_0_0_60' => 7,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15.0,
            'recommended_p' => 10.0,
            'recommended_k' => 15.0,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 25,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 8,
        ]);  
        
        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => null,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => null,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => null,
            'fertilizer_18_46_0' => 22,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 11,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 3,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 3,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 17,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,  // ข้าวโพด
            'sub_plant_id' => 1,  // ข้าวโพดเลี้ยงสัตว์
            'stage_id' => 2,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 3,
            'fertilizer_18_46_0' => 5,
            'fertilizer_0_0_60' => 8,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);


        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 15,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 10,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 10,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        
        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 1,
            'stage_id' => 3,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 สัปดาห์)
            'recommended_n' => 5,
            'recommended_p' => 2.5,
            'recommended_k' => 5,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

         // ข้อมูลสำหรับข้าวโพดฝักสด
         FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2,  // ข้าวโพดฝักสด
            'stage_id' => 4,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 30,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 25,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 25,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 25,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 15,
        ]);


        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 26,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 26,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 26,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 28,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 15,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 25,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 4,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 10,
            'fertilizer_0_0_60' => 15,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 3,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 30,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 35,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 20,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 10,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 8,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 20,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 15,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 2,
            'sub_plant_id' => 2, 
            'stage_id' => 5, //.ใส่ปุ๋ยครั้งที่ 2
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 10,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

         // ข้อมูลสำหรับอ้อยปลูก
         FertilizerSuggestion::create([
            'plant_id' => 3,  // อ้อย
            'sub_plant_id' => 3,  // อ้อยปลูก
            'stage_id' => 6,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

         
          FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 15,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 18,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 18,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 18,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 8,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 0,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 0,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 0,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 1,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 4,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 4,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,  
            'sub_plant_id' => 3,  
            'stage_id' => 6, 
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 4,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' =>29 ,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' =>23 ,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 21,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 23,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 12,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 13,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 3,
            'stage_id' => 7,  
            'recommended_n' => 6,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);


          // ข้อมูลสำหรับอ้อยตอ
          FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  // อ้อยตอ
            'stage_id' => 8,  // ใส่ปุ๋ยครั้งที่ 1 (รองพื้นพร้อมปลูก)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8, 
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 22,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 24,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 27,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 12,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 17,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 9,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 11,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 14,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 2,
            'fertilizer_18_46_0' => 20,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 5,
            'fertilizer_18_46_0' => 13,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 30,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 20,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,  
            'stage_id' => 8,  
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 7,
            'fertilizer_18_46_0' => 7,
            'fertilizer_0_0_60' => 10,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 27,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 29,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 18,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 20,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 15,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 16,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 9,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 6,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 18,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 12,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);

        FertilizerSuggestion::create([
            'plant_id' => 3,
            'sub_plant_id' => 4,
            'stage_id' => 9,  // ใส่ปุ๋ยครั้งที่ 2 (อายุ 3-4 เดือน)
            'recommended_n' => 9,
            'recommended_p' => 3,
            'recommended_k' => 6,
            'fertilizer_46_0_0' => 10,
            'fertilizer_18_46_0' => null,
            'fertilizer_0_0_60' => null,
        ]);
    }
}
