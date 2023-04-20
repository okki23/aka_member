<?php
 
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
 
use Symfony\Component\HttpKernel\Profiler\Profile;

 Route::get('/', function () {
     return view('welcome');
 });
   
 Auth::routes();


 Route::group(['middleware' => ['auth']], function() { 
     Route::get('/home', [HomeController::class,'index'])->name('home'); 
     
     //master-member
     Route::get('/member',[MemberController::class,'index'])->name('member');
     Route::post('/member_save',[MemberController::class,'save'])->name('member_save');
     Route::get('/member_add_form',[MemberController::class,'add_form'])->name('member_add_form');
 });