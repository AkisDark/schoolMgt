<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $materials = [];


        $materials[] = [
            'name' => 'ت.اسلامية'
        ];

        $materials[] = [
            'name' => 'ت.مدنية'
        ];

        $materials[] = [
            'name' => 'ت.بدنية'
        ];

        $materials[] = [
            'name' => 'رياضيات'
        ];


        $materials[] = [
            'name' => 'فرنسية'
        ];


        $materials[] = [
            'name' => 'انجليزية'
        ];

        $materials[] = [
            'name' => 'موسيقى'
        ];

        $materials[] = [
            'name' => 'العلوم الطبيعية'
        ];

        $materials[] = [
            'name' => 'العلوم الفيزيائية'
        ];

        //DB::table('materials')->insert($materials);
        Material::insert($materials);
    }
}
