<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantTypesTable extends Migration
{
    public function up()
    {
        Schema::create('plant_types', function (Blueprint $table) {
            $table->id();
            $table->string('plant_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plant_types');
    }
}
