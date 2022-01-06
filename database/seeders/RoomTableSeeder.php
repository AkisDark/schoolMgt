<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $rooms = [];

        $rooms[] = [
            'name' => '1',
            'level_id' => 1,
            'specialization_id' => 1
        ];

        $rooms[] = [
            'name' => '2',
            'level_id' => 1,
            'specialization_id' => 1
        ];

        $rooms[] = [
            'name' => '1',
            'level_id' => 2,
            'specialization_id' => 2
        ];

        $rooms[] = [
            'name' => '2',
            'level_id' => 2,
            'specialization_id' => 2
        ];

        $rooms[] = [
            'name' => '1',
            'level_id' => 3,
            'specialization_id' => 3
        ];

        $rooms[] = [
            'name' => '2',
            'level_id' => 3,
            'specialization_id' => 3
        ];

        DB::table('rooms')->insert($rooms);
    }
}
