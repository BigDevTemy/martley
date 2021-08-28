<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\loanTable;
use App\Models\loanStructure;
use Carbon\Carbon;

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
            
            if(Auth::user()->hasRole('super-admin')){
                return redirect()->route('admindashboard');
            }
            if(Auth::user()->hasRole('loan_officers')){
                return redirect()->route('loanadmindashboard');
            }
            //return back()->withErrors([
                //'Welcome' => Auth::user(),
           // ]);
        }

        return back()->withErrors([
            'Message' => 'The provided credentials do not match our records.',
        ]);

        
    }
    public function admindashboard(){
        $loan_count = count(loanTable::where('review_status','Approved')->get());
        $repayment_count = count(loanStructure::where('status','paid')->get());
        $customer_base = count(User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get());
        $loan_sum = loanTable::where('review_status','Approved')->sum('loan_amount');
        $repayment_sum = loanStructure::where('status','paid')->sum('amount');
        $all_customer = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();

        return view('backendUsers.dashboard',compact('loan_count','repayment_count','customer_base','loan_sum','repayment_sum','all_customer'));
    }

    public function loanadmindashboard(){
        $loan_count = count(loanTable::where('review_status','Approved')->where('initiator_userid',Auth::user()->userid)->get());
        $repayment_count = count(loanStructure::where('status','paid')->where('userid',Auth::user()->userid)->get());
        $customer_base = count(User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get());
        $loan_sum = loanTable::where('review_status','Approved')->where('userid',Auth::user()->userid)->sum('loan_amount');
        $repayment_sum = loanStructure::where('status','paid')->where('userid',Auth::user()->userid)->sum('amount');
        $workdone = loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','unpaid')->where('due_date',Carbon::now()->toDateString())->get();
        //return Carbon::now();
        //return $workdone; 
        $expected_till =  loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','unpaid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
         $current_till =  loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','paid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
        return view('backendUsers.loan_manager_dashboard',compact('loan_count','repayment_count','customer_base','loan_sum','repayment_sum','workdone','expected_till','current_till'));
    }
}
