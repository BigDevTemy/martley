<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(){
        /*
        $roles = \Spatie\Permission\Models\Role::all();

        return response($roles);
        */
        return view('martley.index');
    }
    public function adminloginpage(){
        return view('martley.signin-cover');
    }
    public function createadmin(){
        $roles = \Spatie\Permission\Models\Role::all();

        
        return view('martley.signup-cover',compact('roles'));
    }
    public function generateUserId(){
        $rand = random_int(100000, 999999);
        $check = User::where('userid',$rand)->first();

        if($check !=""){
            $this->generateUserId();
        }
        else{
            return $rand;
        }

    }
    public function save_admin(Request $request){
        $userid = $this->generateUserid();

        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'sex' => 'required',
            'password' => 'required',
        ]);

       

        $create = User::create([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'sex'=>$request->sex,
            'email'=>$request->lname.'.'.$request->fname.'@matley.com',
            'userid'=>$userid,
            'password'=>Hash::make($request->password),
        ]);
        $create->assignRole($request->role);
        if($create){
            return Redirect::back()->withErrors(['Admin Successfully Created']);
        }
        else{
            return Redirect::back()->withErrors(['An Error Occurred']);
        }

       
    }

    public function signin(Request $request){
        $validated = $request->validate([
            'fname' => 'required',
            'password' => 'required',
            
        ]);
        $credentials = ['fname'=>$request->fname,'password'=>$request->password];
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admindashboard');
            //return back()->withErrors([
                //'Welcome' => Auth::user(),
           // ]);
        }

        return back()->withErrors([
            'Message' => 'The provided credentials do not match our records.',
        ]);

        
    }
    public function admindashboard(){
        return view('backendUsers.dashboard');
    }
}
