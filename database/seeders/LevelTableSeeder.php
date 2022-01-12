<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $levels = [];

        $levels[] = [
            'name' => '1'
        ];

        $levels[] = [
            'name' => '2'
        ];

        $levels[] = [
            'name' => '3'
        ];

        DB::table('levels')->insert($levels);
    }
}
