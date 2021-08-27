<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BackendController;
use App\Http\Middleware\super_admin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/',[PublicController::class,'index'])->name('index');
Route::get('/admin/login',[PublicController::class,'adminloginpage'])->name('adminlogin_page');
Route::get('/admin/creation',[PublicController::class,'createadmin'])->name('createadmin');
Route::post('/save/admin/',[PublicController::class,'save_admin'])->name('save_admin');
Route::post('/admin/signin',[PublicController::class,'signin'])->name('signin');
Route::middleware([super_admin::class])->group(function(){
    Route::prefix('SuperAdmin')->group(function(){
        Route::get('/admin/dashboard',[PublicController::class,'admindashboard'])->name('admindashboard');
      //  Route::get('/admin/dashboard',[PublicController::class,'admindashboard'])->name('admindashboard');
        Route::get('/approve/customer/loan/{id}',[BackendController::class,'approveloan'])->name('approveloan');
        Route::post('/approve/customer/loan/update',[BackendController::class,'updatereview'])->name('updatereview');
        Route::get('/admin/awaiting/customer_creation/approval',[BackendController::class,'awaiting_customer_approval'])->name('awaiting_customer_approval');
        Route::get('/admin/approval/customer/{id}',[BackendController::class,'changeCustomerStatus'])->name('changeCustomerStatus');
        Route::get('/admin/approval/loanrequest',[BackendController::class,'awaiting_loan_approval'])->name('awaiting_loan_approval');
    });
   
});

Route::middleware([super_admin_loan_manager::class])->group(function(){
    Route::prefix('LoanManager')->group(function(){
    Route::get('/admin/dashboard',[PublicController::class,'loanadmindashboard'])->name('loanadmindashboard');
    Route::get('/create_new_customer',[BackendController::class,'create_new_customer'])->name('create_new_customer');
    Route::post('/add/customer',[BackendController::class,'addCustomer'])->name('addCustomer');
    Route::get('/initiate/customerloan',[BackendController::class,'initiateLoan'])->name('initiateLoan');
    Route::get('/submitloanrequest/{id}/{limit}',[BackendController::class,'submitloanrequest'])->name('submitloanrequest');
    Route::get('/customer/loan_detail/{id}',[BackendController::class,'customer_loan_details'])->name('customer_loan_details');
    Route::post('/update/customer/daily/repayment',[BackendController::class,'update_customer_daily_repayment'])->name('update_customer_daily_repayment');

    
    
});
    
});

