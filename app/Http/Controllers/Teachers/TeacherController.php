<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Room;
use App\Models\Level;
use App\Models\Wilaya;
use App\Models\Teacher;
use App\Models\Material;
use App\Models\TeacherRoom;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){

         $techRoom = new Teacher();

         $level = new Level();

         $specialization = new Specialization();

         $techRoom = new Teacher();
    
        $teachers = Teacher::with(['wilaya', 'material'])->get(); 
      
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        return view('admin.teachers.index', compact('teachers', 'wilayas', 'materials', 'techRoom', 'level', 'specialization'));
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
                    DB::table('room_teacher')->insert([
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
