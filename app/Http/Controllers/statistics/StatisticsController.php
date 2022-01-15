<?php

namespace App\Http\Controllers\statistics;

use App\Models\Room;
use App\Models\User;
use App\Models\_Parent;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $data = [
            'members' => User::count(),
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'specializations' => Specialization::count(),
            'materials' => Material::count(),
            'parents' => _Parent::count(),
        ];

        return view('admin.statistics.index', compact('data'));
    }

    public function classesStatistics(){
        $students = DB::table('students')
                    ->select('students.level_id', 'students.specialization_id', 'students.room_id',
                             DB::raw('concat(levels.name, " ", specializations.name, " ", rooms.name) as stsRooms'),
                             DB::raw('count(*) as count'))

                    ->join('rooms', 'students.room_id', '=', 'rooms.id')
                    ->join('levels', 'students.level_id', '=', 'levels.id')
                    ->join('specializations', 'specializations.id', '=', 'students.specialization_id')
                    ->groupBy('students.level_id', 'students.specialization_id', 'students.room_id', 'stsRooms')
                    ->get();

         return $students;           
    }
}
