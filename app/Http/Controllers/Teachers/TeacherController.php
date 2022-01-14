<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Room;
use App\Models\Wilaya;
use App\Models\Teacher;
use App\Models\Material;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    //
    public function index(){
    
        $teachers = Teacher::with(['wilaya', 'material'])->get(); 

        $rooms = DB::table('teacher_room')
                ->select('rooms.id', DB::raw("concat(levels.name ,' ', specializations.name ,' ' ,rooms.name) as name"))
                ->join('rooms', 'rooms.id', '=', 'teacher_room.room_id')
                ->join('levels', 'levels.id', '=', 'rooms.level_id')
                ->join('specializations', 'specializations.id', '=', 'rooms.specialization_id');
      
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        return view('admin.teachers.index', compact('teachers', 'wilayas', 'materials', 'rooms'));
    }

    public function create(){
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        $rooms = Room::with(['level', 'specialization'])->get();
        return view('admin.teachers.create', 
                    compact('wilayas', 'materials', 'rooms'));
    }

    public function store(Request $request){
        if($request){
            $teacher = Teacher::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'date_of_birth' => $request->dateOfBirth,
                'wilaya_id' => $request->wilayaId,
                'joining_date' => $request->joiningDate,
                'material_id' => $request->materialId,
                'gender' => $request->gender,
            ]);

            if(!empty($teacher->id)){
                foreach(explode(',', $request->roomId) as $roomId){
                    DB::table('teacher_room')->insert([
                        'teacher_id' => $teacher->id,
                        'room_id' => $roomId
                    ]);
                }
            }

            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function update(TeacherRequest $request){
        if(Teacher::where('id', $request->id)->exists()){
            Teacher::where('id', $request->id)->update([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'date_of_birth' => $request->dateOfBirth,
                'wilaya_id' => $request->wilayaId,
                'joining_date' => $request->joiningDate,
                'material_id' => $request->materialId,
                'gender' => $request->gender,
            ]);
            return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    

    
    public function destroy(Request $request){
        if(Teacher::where('id', $request->idDel)->exists()){
            $del = Teacher::where('id', $request->idDel);
            $del->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }
}
