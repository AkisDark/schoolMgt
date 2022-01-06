<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Level;
use App\Models\_Parent;
use App\Models\Category;
use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $students = [];

        $students[] = [
            'first_name' => 'موسعي',
            'last_name' => 'أحمد',
            'wilaya_id' => 28,
            'date_of_birth' => '2010-10-03',
            'gender' => 'ذكر',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'دهمش',
            'last_name' => 'مختار',
            'wilaya_id' => 28,
            'date_of_birth' => '2010-09-03',
            'gender' => 'ذكر',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'برة',
            'last_name' => 'سعيد',
            'wilaya_id' => 28,
            'date_of_birth' => '2011-07-23',
            'gender' => 'ذكر',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'طاهري',
            'last_name' => 'مراد',
            'date_of_birth' => '2012-09-12',
            'wilaya_id' => 28,
            'gender' => 'ذكر',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'نابي',
            'last_name' => 'ياسين',
            'wilaya_id' => 28,
            'date_of_birth' => '2013-10-12',
            'gender' => 'ذكر',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'بتة',
            'last_name' => 'رانية',
            'wilaya_id' => 28,
            'date_of_birth' => '2013-10-12',
            'gender' => 'انثى',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'سعيدي',
            'last_name' => 'ياسمين',
            'wilaya_id' => 28,
            'date_of_birth' => '2013-10-12',
            'gender' => 'انثى',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'بورنان',
            'last_name' => 'خديجة',
            'wilaya_id' => 28,
            'date_of_birth' => '2013-10-12',
            'gender' => 'انثى',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        $students[] = [
            'first_name' => 'قاسمي',
            'last_name' => 'خيرة',
            'wilaya_id' => 28,
            'date_of_birth' => '2013-10-12',
            'gender' => 'انثى',
            'parent_id' => _Parent::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'room_id' => Room::all()->random()->id,
            'specialization_id' => Specialization::all()->random()->id,
        ];

        DB::table('students')->insert($students);
    }
}
