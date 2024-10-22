<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomFormulaInputToFertilizerCalculationHistoriesV2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fertilizer_calculation_histories_v2', function (Blueprint $table) {
            $table->text('custom_formula_input')->nullable(); // เพิ่มคอลัมน์สำหรับเก็บข้อมูลสูตรปุ๋ยที่ผู้ใช้กรอกเอง
        });
    }
    
    public function down()
    {
        Schema::table('fertilizer_calculation_histories_v2', function (Blueprint $table) {
            $table->dropColumn('custom_formula_input'); // ลบคอลัมน์เมื่อทำการ rollback
        });
    }
    
}
