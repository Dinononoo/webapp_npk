<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDataTable extends Migration
{
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // ใช้ unsignedBigInteger สำหรับ Foreign Key
            $table->unsignedBigInteger('sensor_id'); // ใช้ unsignedBigInteger สำหรับ Foreign Key
            $table->float('N');
            $table->float('P');
            $table->float('K');
            $table->float('PH');
            $table->timestamps();

            // สร้าง Foreign Key Constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sensor_id')->references('id')->on('sensors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensor_data');
    }
}
