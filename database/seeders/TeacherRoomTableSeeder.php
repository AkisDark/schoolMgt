<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherRoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pivot = [];

        $pivot[] = [
            'teacher_id' => 1,
            'room_id' => Room::all()->random()->id,

        ];

        $pivot[] = [
            'teacher_id' => 2,
            'room_id' => Room::all()->random()->id,

        ];

        $pivot[] = [
            'teacher_id' => 3,
            'room_id' => Room::all()->random()->id,

        ];

        $pivot[] = [
            'teacher_id' => 4,
            'room_id' => Room::all()->random()->id,

        ];

        DB::table('room_teacher')->insert($pivot);
    }
}
