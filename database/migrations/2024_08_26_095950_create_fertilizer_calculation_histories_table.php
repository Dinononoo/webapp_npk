<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerCalculationHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('fertilizer_calculation_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plant_id');
            $table->unsignedBigInteger('sub_plant_id')->nullable();
            $table->unsignedBigInteger('stage_id');
            $table->json('npk_recommendation'); // บันทึกค่า NPK ที่แนะนำ
            $table->json('fertilizer_mix'); // บันทึกสูตรปุ๋ยที่คำนวณได้
            $table->decimal('ph_min', 5, 2); // บันทึกค่า pH ที่ต่ำสุดที่เหมาะสม
            $table->decimal('ph_max', 5, 2); // บันทึกค่า pH ที่สูงสุดที่เหมาะสม
            $table->string('ph_recommendation')->default('No recommendation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fertilizer_calculation_histories');
    }
}
