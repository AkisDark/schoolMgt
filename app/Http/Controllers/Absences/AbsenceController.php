<?php

namespace App\Http\Controllers\Absences;

use App\Models\Absence;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    //

    public function index(){

        $students = Student::get();
        $absences = Absence::with('student')->get();
        return view('admin.absences.index', compact('absences', 'students'));
    }


    public function create(){
        $students = Student::get();
        return view('admin.absences.create', compact('students'));
    }


    public function store(Request $request){


        if($request) {

            Absence::create([
                'student_id' => $request->student,
                'reason_of_absences' => $request->reasonOfAbsences,
                'date_start' => $request->dateStart,
                'date_end' => $request->dateEnd,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }


    public function update(Request $request){

        if(Absence::where('id', $request->id)) {

            Absence::where('id', $request->id)->update([
                'student_id' => $request->studentId,
                'reason_of_absences' => $request->reasonOfAbsences,
                'date_start' => $request->dateStart,
                'date_end' => $request->dateEnd,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function destroy(Request $request){

        if(Absence::where('id', $request->idDel)->exists()){

            $abs = Absence::where('id', $request->idDel);

            $abs->delete();

            return redirect()->back()->with(['success'=> __('messages.msg_del')]);

        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}
