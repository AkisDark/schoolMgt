<?php

namespace App\Http\Controllers\School;

use App\Models\Dairas;
use App\Models\School;
use App\Models\Wilaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;

class SchoolController extends Controller
{
    //

    public function index(){

        $wilayas = Wilaya::get();
        $school = School::where('id', 1)->with(['wilaya', 'dairas'])->first();
        return view('admin.school.index', compact('school', 'wilayas'));
    }

    public function update(SchoolRequest $request){
 
        if($request) {

            School::where('id', 1)->update([
                'name' => $request->schoolName,
                'email' => $request->email,
                'wilaya_id' => $request->wilaya,
                'dairas_id' => $request->dairas,
                'fixed_phone' => $request->fixedPhone,
                'fax' => $request->fax
            ]);
            
            return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }

        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }

    public function dairas($wilayaId){
        $dairas = Dairas::select('id', 'name')->where('wilaya_id', $wilayaId)->get();
        foreach($dairas as $daira){
            echo '<option value="'.$daira->id.'">'.$daira->name.'</option>';
        
        }

    }
}
