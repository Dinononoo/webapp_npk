<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PlantSeeder::class,        // เรียกใช้ PlantSeeder
            SubPlantSeeder::class,     // เรียกใช้ SubPlantSeeder
            GrowthStageSeeder::class,  // เรียกใช้ GrowthStageSeeder
        ]);
    }
}
