<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoomTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\LevelTableSeeder;
use Database\Seeders\ParentTableSeeder;
use Database\Seeders\SchoolTableSeeder;
use Database\Seeders\WilayaTableSeeder;
use Database\Seeders\CommuneTableSeeder;
use Database\Seeders\StudentTableSeeder;
use Database\Seeders\TeacherTableSeeder;
use Database\Seeders\AbscenceTableSeeder;
use Database\Seeders\MaterialTableSeeder;
use Database\Seeders\TeacherRoomTableSeeder;
use Database\Seeders\SpecializationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            WilayaTableSeeder::class,
            CommuneTableSeeder::class,
            SchoolTableSeeder::class,
            LevelTableSeeder::class,
            SpecializationTableSeeder::class,
            ParentTableSeeder::class,
            RoomTableSeeder::class, 
            MaterialTableSeeder::class, 
            UserTableSeeder::class,
            StudentTableSeeder::class,
            TeacherTableSeeder::class,
            AbscenceTableSeeder::class,
            TeacherRoomTableSeeder::class,
        ]);
    }
}
