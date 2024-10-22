<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerSuggestionsTable extends Migration
{
    public function up()
    {
        Schema::create('fertilizer_suggestions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_id'); // FK จากตาราง plant_types
            $table->unsignedBigInteger('sub_plant_id')->nullable(); // FK จากตาราง sub_plants
            $table->unsignedBigInteger('stage_id'); // FK จากตาราง growth_stages
            $table->float('recommended_n'); // ปริมาณ N ที่แนะนำ
            $table->float('recommended_p'); // ปริมาณ P ที่แนะนำ
            $table->float('recommended_k'); // ปริมาณ K ที่แนะนำ
            $table->float('fertilizer_46_0_0'); // ปริมาณปุ๋ย 46-0-0
            $table->float('fertilizer_18_46_0')->nullable(); // ปริมาณปุ๋ย 18-46-0 (nullable ในบางระยะ)
            $table->float('fertilizer_0_0_60')->nullable(); // ปริมาณปุ๋ย 0-0-60 (nullable ในบางระยะ)
            $table->timestamps();

            // การเชื่อมโยง foreign key
            $table->foreign('plant_id')->references('id')->on('plant_types')->onDelete('cascade');
            $table->foreign('sub_plant_id')->references('id')->on('sub_plants')->onDelete('cascade');
            $table->foreign('stage_id')->references('id')->on('growth_stages')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fertilizer_suggestions');
    }
}
