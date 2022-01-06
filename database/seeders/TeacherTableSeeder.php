<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teachers = [];
        
        $teachers[] = [
            'first_name' => 'مناصري',
            'last_name' => 'مسعود',
            'wilaya_id' => 28,
            'date_of_birth' => '1988-10-12',
            'gender' => 'ذكر',
            'material_id' => Material::all()->random()->id,
            'joining_date' => '2016-10-12',
        ];

        $teachers[] = [
            'first_name' => 'بتقة',
            'last_name' => 'بلال',
            'wilaya_id' => 28,
            'date_of_birth' => '1987-10-12',
            'gender' => 'ذكر',
            'joining_date' => '2014-10-12',
            'material_id' => Material::all()->random()->id,
        ];

        $teachers[] = [
            'first_name' => 'بوخلط',
            'last_name' => 'أية',
            'wilaya_id' => 28,
            'date_of_birth' => '1993-10-12',
            'gender' => 'انثى',
            'joining_date' => '2020-10-20',
            'material_id' => Material::all()->random()->id,
        ];

        $teachers[] = [
            'first_name' => 'زغبة',
            'last_name' => 'حنان',
            'wilaya_id' => 28,
            'date_of_birth' => '1991-10-12',
            'gender' => 'انثى',
            'joining_date' => '2018-10-28',
            'material_id' => Material::all()->random()->id,
        ];

        DB::table('teachers')->insert($teachers);
    }
}
