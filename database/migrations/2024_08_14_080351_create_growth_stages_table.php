<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrowthStagesTable extends Migration
{
    public function up()
    {
        Schema::create('growth_stages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_id');
            $table->unsignedBigInteger('sub_plant_id')->nullable();  // สามารถเป็น null ได้
            $table->string('stage_name');
            $table->timestamps();

            // ตั้งค่า foreign key สำหรับ plant_id
            $table->foreign('plant_id')->references('id')->on('plant_types')->onDelete('cascade');
            // ตั้งค่า foreign key สำหรับ sub_plant_id
            $table->foreign('sub_plant_id')->references('id')->on('sub_plants')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('growth_stages');
    }
}
