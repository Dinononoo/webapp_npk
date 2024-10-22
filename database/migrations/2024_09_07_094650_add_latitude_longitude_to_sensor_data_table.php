<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatitudeLongitudeToSensorDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sensor_data', function (Blueprint $table) {
            $table->decimal('latitude', 12, 10)->nullable()->change();  // เปลี่ยนความละเอียดของทศนิยมเป็น 10 ตำแหน่ง
            $table->decimal('longitude', 12, 10)->nullable()->change(); // เปลี่ยนความละเอียดของทศนิยมเป็น 10 ตำแหน่ง
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sensor_data', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
}
