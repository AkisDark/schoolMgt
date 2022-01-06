<?php

namespace App\Http\Controllers\Specialties;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;
use App\Http\Requests\SpecializationRequest;

class SpecialtieController extends Controller
{
    //

    public function index(){
        $specialties = Specialization::get();
        return view('admin.specialties.index', compact('specialties'));
    }

    public function create(){
        return view('admin.specialties.create');
    }

    public function store(SpecializationRequest $request){


        if($request) {

            Specialization::create([
                'name' => $request->nameSp,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function update(Request $request){

        if(Specialization::where('id', $request->id)->exists() && !empty($request->specialization)) {

            Specialization::where('id', $request->id)->update([
                'name' => $request->specialization,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }


    public function destroy(Request $request){
        if(Specialization::where('id', $request->idDel)->exists()){
            $spc = Specialization::where('id', $request->idDel);
            $spc->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}
