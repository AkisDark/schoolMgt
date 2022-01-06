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

class StudentController extends Controller
{
    //

    public function index(){
        
        $students = Student::with(['wilaya', 'level', 'room', 'specialization'])->get();
        return view('admin.students.index', compact('students'));
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

    public function destroy(Request $request){
        if(Student::where('id', $request->idDel)->exists()){
            $del = Student::where('id', $request->idDel);
            $del->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}
