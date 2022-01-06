<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbscenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $absences[] = [
            'student_id' => Student::all()->random()->id,
            'reason_of_absences' => 'مرض',
            'date_start' => '2021-12-25',
            'date_end' => date('Y-m-d'),

        ];

        $absences[] = [
            'student_id' => Student::all()->random()->id,
            'reason_of_absences' => 'وفاة',
            'date_start' => '2021-12-25',
            'date_end' => date('Y-m-d'),

        ];

        $absences[] = [
            'student_id' => Student::all()->random()->id,
            'reason_of_absences' => 'سبب اخر',
            'date_start' => '2021-12-25',
            'date_end' => date('Y-m-d'),

        ];

        DB::table('absences')->insert($absences);


    }
}
