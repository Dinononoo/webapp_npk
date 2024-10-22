<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFertilizerWeightToFertilizerCalculationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fertilizer_calculation_histories', function (Blueprint $table) {
            $table->decimal('fertilizer_weight', 8, 2)->nullable(); // Adjust precision as needed
        });
    }
    
    public function down()
    {
        Schema::table('fertilizer_calculation_histories', function (Blueprint $table) {
            $table->dropColumn('fertilizer_weight');
        });
    }
    
}
