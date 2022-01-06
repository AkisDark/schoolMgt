<?php

namespace App\Http\Controllers\Materials;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;

class MaterialController extends Controller
{
  
    //

    public function index(){
        $materials = Material::get();
        return view('admin.materials.index', compact('materials'));
    }

    public function create(){
        return view('admin.materials.create');
    }

    public function store(MaterialRequest $request){


        if($request) {

            Material::create([
                'name' => $request->nameMt,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }


    public function update(MaterialRequest $request){

        if(Material::where('id', $request->id)) {
            Material::where('id', $request->id)->update([
                'name' => $request->material,
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }


    public function destroy(Request $request){

        if(Material::where('id', $request->idDel)->exists()){

            $del = Material::where('id', $request->idDel);

            $del->delete();

            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}

