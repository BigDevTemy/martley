<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerDetails;
use App\Models\loanTable;
use App\Models\loanStructure;
use Carbon\Carbon;
use App\Models\awaitingloanapproval;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Collection;

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
    public function generateLoanid(){
        $rand = random_int(1000, 9999);
        $check = loanTable::where('userid',$rand)->first();

        if($check !=""){
            $this->generateLoanid();
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
        $create_customer_details->inloan = 0;
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
        /*
        $customers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user')->where('');
            }
        )->get();
        */
            //$customer="";
        $get_array = array();
        if(Auth::user()->hasRole('super-admin'))
        {
            $customers = DB::table('users')
            ->join('customer_details','customer_details.userid','=','users.userid')
            ->where('customer_details.approved_status','Approved')
            ->where('customer_details.inloan','0')
            ->get();
        }
        else if(Auth::user()->hasRole('loan_officers')){
            $customers = DB::table('users')
            ->join('customer_details','customer_details.userid','=','users.userid')
            ->where('customer_details.loan_manager_userid', Auth::user()->userid)
            ->where('customer_details.inloan','<>',1)
            ->where('customer_details.approved_status','Approved')
            ->get();
        }
        
        return view('backendUsers.initiateloan',compact('customers'));
    }

    public function approveloan($userid){
        
        $getUserDetails = User::where('userid',$userid)->first();
        $getCustomerDetails = CustomerDetails::where('userid',$userid)->first();
        $loanHistory = loanTable::where('userid',$userid)->get();
        return view('backendUsers.review_loan',compact('getUserDetails','loanHistory','getCustomerDetails'));
    }

    public function updatereview(Request $request){
        $check = loanTable::where('userid',$request->userid)->where('review_status','Approved')->where('loan_status','unpaid')->first();
        //$loanstructure = array();
        $loanId = $this->generateLoanid();
        if($check!=""){
            return Redirect::back()->withErrors(['The User is Already In Loan']);
        }
        else{

            if($request->loan_manager == ""){
                $initiator_userid = Auth::user()->userid;
            }
            else{
                $initiator_userid = $request->loan_manager;
            }

            $calculatedInterest = \floatval($request->loanlimit) * \floatval($request->interest/100);
            $loanTotal  = \floatval($request->loanlimit) + \floatval($calculatedInterest);
            $member = new loanTable();
            $loanId = $this->generateLoanid();
            $member->userid = $request->userid;
            $member->loanid = $loanId;
            $member->loan_interest = \floatval($request->interest/100);
            $member->loan_tenure = $request->loantenure;
            $member->loan_status = 'unpaid';
            $member->loan_amount = $request->loanlimit;
            $member->loan_total = $loanTotal;
            $member->review_status = 'Approved';
            $member->initiator_userid = $initiator_userid;
            $member->approved_userid = Auth::user()->userid;
            $member->save();

            $getid = awaitingloanapproval::where('userid',$request->userid)->where('review_status','unreviewed')->first();
            $update = awaitingloanapproval::find($getid->id);
            $update->review_status = "Approved";
            $update->save();

            $customer_details = CustomerDetails::where('userid',$request->userid)->first();
            $update = CustomerDetails::find($customer_details->id);
            $update->inloan =1;
            $update->save();


            $cal_loan_repayment = \floatval($request->loanlimit) / \floatval($request->loantenure);
            //$newDateTime = Carbon::now()->addDay(10);
            for($i=1; $i <= $request->loantenure ; $i++) {
                $member = new loanStructure();
                $member->userid = $request->userid;
                $member->loanid = $loanId;
                $member->amount = $cal_loan_repayment;
                $member->due_date = Carbon::now()->addDay($i)->toDateString();
                $member->status = 'unpaid';
                $member->initiator_userid = $initiator_userid;
                $member->save();
            }
            
            return Redirect::back()->withErrors(['Loan Successfully Approved.']);
            
        } 

    }

    public function awaiting_customer_approval(){
        $pending = CustomerDetails::where('approved_status','Pending Approval')->get();
        
        return view('backendUsers.awaiting_approval',compact('pending'));
    }

    public function changeCustomerStatus($userid){
        $get = CustomerDetails::where('userid',$userid)->first();
        $update = CustomerDetails::find($get->id);
        $update->approved_status = "Approved";
        $update->save();
        return Redirect::back()->withErrors(['Customer Successfully Approved.']);
    }

    public function submitloanrequest($userid,$limit){
        $member = new awaitingloanapproval();

        $check = awaitingloanapproval::where('userid',$userid)->where('review_status','unreviewed')->first();
        if($check!=""){
            return Redirect::back()->withErrors(['Loan Request Already In Review.']); 
        }
        else{
            $member = new awaitingloanapproval();
            $member->userid = $userid;
            $member->fullname = $member->user->fname ." " . $member->user->fname;
            $member->loan_amount = $limit;
            $member->review_status = "unreviewed";
            $member->loan_manager_userid = Auth::user()->userid;
            $member->save();
            return Redirect::back()->withErrors(['Loan Request has Been Submitted.']);
        }
        
    }

    public function awaiting_loan_approval(){
        $fetch = awaitingloanapproval::where('review_status','unreviewed')->get();
        return view('backendUsers.awaiting_loan_request',compact('fetch'));

    }

    public function customer_loan_details($loanid){
        $loanstructure = loanStructure::where('loanid',$loanid)->orderBy('id')->get();
        $voodoo = loanStructure::where('loanid',$loanid)->first();
        $loanHistory = loanTable::where('userid',$voodoo->userid)->orderBy('id')->get();
        $user = User::where('userid',$voodoo->userid)->first();

        return view('backendUsers.customer_loan_details',\compact('loanstructure','loanHistory','user'));
    }

    public function update_customer_daily_repayment(Request $request){
        $id = loanStructure::where('due_date',$request->due_date)->where('loanid',$request->loanid)->first();
        $update = loanStructure::find($id->id);
        $update->status = "paid";
        $update->save();
        return response('Data Successfully Saved');
    }

    public function pending_approval_loans(){
        $get_pending_customer_approval = CustomerDetails::where('loan_manager_userid',Auth::user()->userid)->where('approved_status','Pending Approval')->get();
        $get_pending_customer_loan_request = awaitingloanapproval::where('loan_manager_userid',Auth::user()->userid)->where('review_status','unreviewed')->get();
        //return $get_pending_customer_approval;
        return view('backendUsers.pending',compact('get_pending_customer_approval','get_pending_customer_loan_request'));
    }

    public function daily_order(){
        //$loan_count = count(loanTable::where('review_status','Approved')->where('initiator_userid',Auth::user()->userid)->get());
        //$repayment_count = count(loanStructure::where('status','paid')->where('userid',Auth::user()->userid)->get());
        //$customer_base = count(User::whereHas(
          //  'roles', function($q){
            //    $q->where('name', 'user');
            //}
        //)->get());
       // $loan_sum = loanTable::where('review_status','Approved')->where('userid',Auth::user()->userid)->sum('loan_amount');
        //$repayment_sum = loanStructure::where('status','paid')->where('userid',Auth::user()->userid)->sum('amount');
        $workdone = loanStructure::where('initiator_userid',Auth::user()->userid)->where('due_date',Carbon::now()->toDateString())->get();
        $till_tracker = loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','paid')->where('due_date',Carbon::now()->toDateString())->get();
         $expected_till =  loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','unpaid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
         $current_till =  loanStructure::where('initiator_userid',Auth::user()->userid)->where('status','paid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
        return view('backendUsers.daily_order',compact('workdone','expected_till','current_till','till_tracker'));

        
    }

    public function all_customers_loan_manager(){
        $get_customers = DB::table('users')
        ->join('customer_details','customer_details.userid','=','users.userid')
        ->join('loantable','loantable.userid','=','users.userid')
        ->where('loan_manager_userid',Auth::user()->userid)
        ->get();

        return view('backendUsers.all_customers',\compact('get_customers'));
    }
    public function customer_profile_details($userid){

        if(Auth::user()->hasRole('loan_officers')){
            $user = DB::table('users')
            ->join('customer_details','customer_details.userid','=','users.userid')
            ->where('loan_manager_userid',Auth::user()->userid)
            ->first();
            $loanHistory = loanTable::where('userid',$userid)->where('initiator_userid',Auth::user()->userid)->get();
            $loanstructure = loanStructure::where('userid',$userid)->where('initiator_userid',Auth::user()->userid)->get();
            
            $loan_count = count(loanTable::where('userid',$userid)->where('loan_status','paid')->orWhere('loan_status','unpaid')->get());
            $repayment_count = count(loanTable::where('userid',$userid)->where('loan_status','paid')->get());
           
            $loan_sum = loanTable::where('userid',$userid)->where('loan_status','unpaid')->sum('loan_amount');
            $repayment_sum= loanTable::where('userid',$userid)->where('loan_status','paid')->sum('loan_amount');
            return view('backendUsers.customer_profile_details',\compact('user','loanHistory','loanstructure','loan_sum','loan_count','repayment_sum','repayment_count'));
        }
        else if(Auth::user()->hasRole('super-admin')){
            $user = DB::table('users')
            ->join('customer_details','customer_details.userid','=','users.userid')
            ->first();
            $loanHistory = loanTable::where('userid',$userid)->where('initiator_userid',Auth::user()->userid)->get();
            $loanstructure = loanStructure::where('userid',$userid)->where('initiator_userid',Auth::user()->userid)->get();
            
            $loan_count = count(loanTable::where('userid',$userid)->get());
            $repayment_count = count(loanTable::where('userid',$userid)->where('loan_status','paid')->get());
           
            $loan_sum = loanTable::where('userid',$userid)->where('loan_status','paid')->orWhere('loan_status','unpaid')->get();
            $repayment_sum= loanTable::where('userid',$userid)->where('loan_status','paid')->sum('loan_amount');
            $loanHistory = loanTable::where('userid',$userid)->get();
            $loanstructure = loanStructure::where('userid',$userid)->get();
            return view('backendUsers.customer_profile_details',\compact('user','loanHistory','loanstructure'));
        }
        
    }

    public function review_loan_manager_daily_order(){
        $loan_managers = User::whereHas(
            'roles', function($q){
                $q->where('name', 'loan_officers');
            }
        )->get();
        
        return view('backendUsers.review_loan_manager_daily_order',\compact('loan_managers'));
    }
    public function superadmin_loanadmindashboard($userid){
        $loan_count = count(loanTable::where('review_status','Approved')->where('initiator_userid',$userid)->get());
        $loan_count = count(loanTable::where('review_status','Approved')->where('initiator_userid',$userid)->get());
        $repayment_count = count(loanStructure::where('status','paid')->where('userid',)->get());
        $customer_base = count(User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get());
        $loan_sum = loanTable::where('review_status','Approved')->where('userid',$userid)->sum('loan_amount');
        $repayment_sum = loanStructure::where('status','paid')->where('userid',$userid)->sum('amount');
        $workdone = loanStructure::where('initiator_userid',$userid)->where('status','unpaid')->where('due_date',Carbon::now()->toDateString())->get();
        //return Carbon::now();
        //return $workdone; 
        $expected_till =  loanStructure::where('initiator_userid',$userid)->where('status','unpaid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
         $current_till =  loanStructure::where('initiator_userid',$userid)->where('status','paid')->where('due_date',Carbon::now()->toDateString())->sum('amount');
        return view('backendUsers.loan_manager_dashboard',compact('loan_count','repayment_count','customer_base','loan_sum','repayment_sum','workdone','expected_till','current_till'));
    }
}
