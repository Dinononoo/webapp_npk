<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubPlantsTable extends Migration
{
    public function up()
    {
        Schema::create('sub_plants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_id');
            $table->string('sub_plant_name');
            $table->timestamps();

            $table->foreign('plant_id')->references('id')->on('plant_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_plants');
    }
}
