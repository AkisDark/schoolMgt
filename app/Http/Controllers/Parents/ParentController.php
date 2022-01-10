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

    public function store(Request $request){
        if($request){
            _Parent::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phone,
                'identity_card' => $request->identityCard,
            ]);
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function update(Request $request){
        if($request){
            if(_Parent::where('id', $request->id)->exists()){
                _Parent::where('id', $request->id)->update([
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'identity_card' => $request->identityCard,
                ]);
                return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
            }
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
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
