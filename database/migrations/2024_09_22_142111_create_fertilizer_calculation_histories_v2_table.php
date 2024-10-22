<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerCalculationHistoriesV2Table extends Migration
{
    public function up()
    {
        Schema::create('fertilizer_calculation_histories_v2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plant_id');
            $table->unsignedBigInteger('sub_plant_id')->nullable();
            $table->unsignedBigInteger('stage_id');
            $table->json('npk_recommendation'); // บันทึกค่า NPK ที่แนะนำ
            $table->json('fertilizer_mix'); // บันทึกสูตรปุ๋ยที่คำนวณได้
            $table->decimal('average_n', 8, 2)->nullable(); // ค่าเฉลี่ย N
            $table->decimal('average_p', 8, 2)->nullable(); // ค่าเฉลี่ย P
            $table->decimal('average_k', 8, 2)->nullable(); // ค่าเฉลี่ย K
            $table->decimal('fertilizer_weight', 8, 2)->nullable(); // น้ำหนักปุ๋ยที่ต้องการ
            $table->string('calculation_method'); // วิธีคำนวณ: sensor หรือ manual
            $table->decimal('latitude', 10, 7)->nullable(); // บันทึกละติจูด
            $table->decimal('longitude', 10, 7)->nullable(); // บันทึกลองจิจูด
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fertilizer_calculation_histories_v2');
    }
}
