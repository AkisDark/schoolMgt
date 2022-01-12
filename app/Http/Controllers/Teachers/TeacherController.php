<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Wilaya;
use App\Models\Teacher;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    //
    public function index(){
        
        $teachers = Teacher::with(['wilaya', 'material'])->get();
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        return view('admin.teachers.index', compact('teachers', 'wilayas', 'materials'));
    }

    public function create(){
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        return view('admin.teachers.create', 
                    compact('wilayas', 'materials'));
    }

    public function store(TeacherRequest $request){
        if($request){
            Teacher::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'date_of_birth' => $request->dateOfBirth,
                'wilaya_id' => $request->wilayaId,
                'joining_date' => $request->joiningDate,
                'material_id' => $request->materialId,
                'gender' => $request->gender,
            ]);
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
