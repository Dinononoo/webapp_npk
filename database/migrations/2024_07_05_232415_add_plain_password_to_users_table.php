<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_plain_password_to_users_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlainPasswordToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('plain_password')->nullable(); // เพิ่มคอลัมน์ plain_password
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('plain_password'); // ลบคอลัมน์ plain_password
        });
    }
}
