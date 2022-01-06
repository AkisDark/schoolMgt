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
            'teacher_id' => Teacher::all()->random()->id,
            'room_id' => Room::all()->random()->id,

        ];

        DB::table('teacher_room')->insert($pivot);
    }
}
