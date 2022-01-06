<?php

namespace App\Http\Controllers\Teachers;

use App\Models\Wilaya;
use App\Models\Teacher;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    //
    public function index(){
        
        $teachers = Teacher::with(['material'])->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create(){
        $wilayas = Wilaya::get(); 
        $materials = Material::get();
        return view('admin.teachers.create', 
                    compact('wilayas', 'materials'));
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
