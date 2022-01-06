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
            'name' => 'السنة الأولى'
        ];

        $levels[] = [
            'name' => 'السنة الثانية'
        ];

        $levels[] = [
            'name' => 'السنة الثالثة'
        ];

        DB::table('levels')->insert($levels);
    }
}
