<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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