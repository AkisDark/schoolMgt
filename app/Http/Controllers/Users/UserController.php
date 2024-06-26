<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function __construct()
    {
         $this->middleware('auth')->except(['login', 'index']);
    }


    public function members(){
        $users = User::get();
        return view('admin.members.index', compact('users'));
    }

    public function create(){
        return view('admin.members.create');
    }

    public function index(){
        return view('admin.login.index');
    }
    
    public function profile(){
        return view('admin.login.profile');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:5', 'max:200'],
        ]);

        $success = auth()->attempt(['email' => request('email'),'password' => request('password')]);

        if ($success) 
            return redirect('dashboard/school');

        return redirect()->back()->with(['error'=> 'خطأ في اخال البيانات']);

    }

    public function store(UserRequest $request){
        if($request){
                User::create([
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password)
                ]);
                return redirect()->back()->with(['success'=> __('messages.msg_add')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }

    public function updateDataMembers(MemberRequest $request){
        if($request){
                 User::where('id', $request->id)->update([
                    'first_name' => $request->firstName,
                    'last_name' => $request->lastName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ]);
                return redirect()->back()->with(['success'=> __('messages.msg_upt')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);
    }
    
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function destroy(Request $request){
        if(User::where('id', $request->idDel)->exists()){
            $user = User::where('id', $request->idDel);
            $user->delete();
            return redirect()->back()->with(['success'=> __('messages.msg_del')]);
        }
        return redirect()->back()->withInput()->withErrors($request)->with(['error'=> __('messages.msg_error')]);

    }

}
