<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $specializations = [];

        $specializations[] = [
            'name' => 'جذع مشترك'
        ];

        $specializations[] = [
            'name' => 'علمي'
        ];

        $specializations[] = [
            'name' => 'ادبي'
        ];

        $specializations[] = [
            'name' => 'لغات'
        ];

        $specializations[] = [
            'name' => 'تسيير واقتصاد'
        ];

        $specializations[] = [
            'name' => 'رياضيات'
        ];

        $specializations[] = [
            'name' => 'تقني رياضي'
        ];

        DB::table('specializations')->insert($specializations);
    }
}
