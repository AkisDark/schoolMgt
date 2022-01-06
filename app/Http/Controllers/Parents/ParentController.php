<?php

namespace App\Http\Controllers\Parents;

use App\Models\_Parent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{
    //

    public function index(){
        $parents = _Parent::get();
        return view('admin.parents.index', compact('parents'));
    }


    public function create(){
        return view('admin.parents.create');
    }

    public function destroy(Request $request){
        if(_Parent::where('id', $request->idDel)->exists()){
            $parent = _Parent::where('id', $request->idDel);
            $parent->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }
}
