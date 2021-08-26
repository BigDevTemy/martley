<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerDetails;
use App\Models\loanTable;

use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    //
    public function create_new_customer(){
        return view('backendUsers.create_new_customer');
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
    public function addCustomer(Request $request){
        //return $request->all();
       
        $validated = $request->validate([
            'cus_fname' => 'required',
            'cus_lname' => 'required',
            'cus_sex' => 'required',
            'cus_phonenumber' => 'required',
            'cus_address' => 'required',
            'town' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'employment_type' => 'required',
            'cust_bus_name' => 'required',
            'cust_bus_addr' => 'required',
            'cust_bus_phonenumber' => 'required',
            'risk_appetite' => 'required',
            'monthly_turn_over'=>'required',
            'loan_limit'=>'required',
            'country'=>'required',

        ]);
        $userid = $this->generateUserId();

        $create = User::create([
            'fname'=>$request->cus_fname,
            'lname'=>$request->cus_lname,
            'sex'=>$request->cus_sex,
            'email'=>$request->cus_email,
            'password'=>Hash::make('secret'),
            'userid'=>$userid,
            'address'=>$request->cus_address,
            'town'=>$request->town,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'country'=>$request->country,
            'phonenumber'=>$request->cus_phonenumber,
            'additional_infor'=>$request->additional_info,

        ]);

        $create->assignRole('user');
        $status = "";
        $approved_by ="";
        $manager_userid = Auth::user()->userid;
        if(Auth::user()->hasRole('super-admin')){
            $status = "Approved";
            $approved_by = Auth::user()->userid;
        }
        else{
            $status = "Pending Approval";
        }
        $create_customer_details = new CustomerDetails();
        $create_customer_details->employment_type=$request->employment_type;
        $create_customer_details->business_name=$request->cust_bus_name;
        $create_customer_details->company_address=$request->cust_bus_addr;
        $create_customer_details->company_phonenumber=$request->cust_bus_phonenumber;
        $create_customer_details->risk_appetite=$request->risk_appetite;
        $create_customer_details->turn_over =$request->monthly_turn_over;
        $create_customer_details->loan_limit =$request->loan_limit;
        $create_customer_details->loan_manager_userid = $manager_userid;
        $create_customer_details->approved_status =$status;
        $create_customer_details->approved_by =$approved_by;
        $create_customer_details->userid = $userid;
        
        $create_customer_details->save();

        if($status == "Approved"){
            return Redirect::back()->withErrors(['Customer Successfully Created']);
        }
        else if($status == "Pending Approval"){
            return Redirect::back()->withErrors(['Customer Details Submitted For Approval']);
        }
        else{
            return Redirect::back()->withErrors(['Internal Server Error...Pls Try again']);
        }
        
    }

    public function initiateLoan(){
        $customers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();

        

        return view('backendUsers.initiateloan',compact('customers'));
    }

    public function approveloan($userid){
        
        $getUserDetails = User::where('userid',$userid)->first();
        return view('backendUsers.review_loan',compact('getUserDetails'));
    }
}
