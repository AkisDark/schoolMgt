<?php

namespace App\Http\Controllers\Students;

use App\Models\Room;
use App\Models\Level;
use App\Models\Wilaya;
use App\Models\_Parent;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    //

    public function index(){
        $wilayas = Wilaya::get(); 
        $levels = Level::get();
        $parents = _Parent::get();
        $rooms = Room::get();
        $specializations = Specialization::get();
        $students = Student::with(['wilaya', 'level', 'room', 'specialization'])->get();
        return view('admin.students.index', compact('students', 'wilayas', 'levels', 'parents',
                                                     'rooms', 'specializations'));
    }

    public function create(){
        $wilayas = Wilaya::get(); 
        $levels = Level::get();
        $parents = _Parent::get();
        $rooms = Room::get();
        $specializations = Specialization::get();
        return view('admin.students.create', 
                    compact('wilayas', 'levels', 'parents', 'rooms', 'specializations'));
    }

    public function store(StudentRequest $request){
        if($request){
            Student::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'date_of_birth' => $request->dateOfBirth,
                'wilaya_id' => $request->wilayaId,
                'gender' => $request->gender,
                'parent_id' => $request->parentId,
                'level_id' => $request->levelId,
                'room_id' => $request->roomId,
                'specialization_id' => $request->specializationId
            ]);
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function update(StudentRequest $request){

        if($request){

            if(Student::where('id', $request->id)->exists()){

                Student::where('id', $request->id)->update([
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'date_of_birth' => $request->dateOfBirth,
                    'wilaya_id' => $request->wilayaId,
                    'gender' => $request->gender,
                    'parent_id' => $request->parentId,
                    'level_id' => $request->levelId,
                    'room_id' => $request->roomId,
                    'specialization_id' => $request->specializationId
                ]);
                return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
            }   
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function destroy(Request $request){
        if(Student::where('id', $request->idDel)->exists()){
            $del = Student::where('id', $request->idDel);
            $del->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}
