<?php

namespace App\Http\Controllers\Classes;

use App\Models\Room;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Requests\ClassRequest;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //
    public function index(){
        $specializations = Specialization::get(); 
        $levels = Level::get(); 
        $rooms = Room::with(['level', 'specialization'])->get();
        return view('admin.classes.index', compact('rooms', 'specializations', 'levels'));
    }

    public function create(){
        $specializations = Specialization::get(); 
        $levels = Level::get(); 
        return view('admin.classes.create', compact('specializations', 'levels'));
    }

    public function store(ClassRequest $request){
        if($request){
            Room::create([
                'name' => $request->className,
                'specialization_id' => $request->specialization,
                'level_id' => $request->level
            ]);
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function update(ClassRequest $request){
        if($request){
            Room::where('id', $request->id)->update([
                'name' => $request->className,
                'specialization_id' => $request->specialization,
                'level_id' => $request->level
            ]);
            return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function destroy(Request $request){
        if(Room::where('id', $request->idDel)->exists()){
            $del = Room::where('id', $request->idDel);
            $del->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }



      
}
