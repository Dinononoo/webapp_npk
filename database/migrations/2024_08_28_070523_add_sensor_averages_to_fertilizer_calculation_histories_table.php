<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSensorAveragesToFertilizerCalculationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fertilizer_calculation_histories', function (Blueprint $table) {
            $table->decimal('average_n', 8, 2)->nullable();
            $table->decimal('average_p', 8, 2)->nullable();
            $table->decimal('average_k', 8, 2)->nullable();
            $table->decimal('average_ph', 8, 2)->nullable();
        });
    }
    public function down()
    {
        Schema::table('fertilizer_calculation_histories', function (Blueprint $table) {
            $table->dropColumn(['average_n', 'average_p', 'average_k', 'average_ph']);
        });
    }
}
