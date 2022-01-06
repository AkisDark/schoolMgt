<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pivot = [];

        $pivot[] = [
            'room_id' => Room::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
        ];

        $pivot[] = [
            'room_id' => Room::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
        ];

        $pivot[] = [
            'room_id' => Room::all()->random()->id,
            'teacher_id' => Teacher::all()->random()->id,
        ];

        DB::table('teacher_room')->insert($pivot);
    }
}
