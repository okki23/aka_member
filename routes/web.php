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
     Route::get('/member_list',[MemberController::class,'datalist'])->name('member_list');
     Route::post('/member_save',[MemberController::class,'save'])->name('member_save');
     Route::post('/destroy',[MemberController::class,'destroy'])->name('member_destroy');
     Route::get('/member_add_form',[MemberController::class,'add_form'])->name('member_add_form');
     Route::get('/member_kartu/{id}',[MemberController::class,'kartu'])->name('member_kartu');
     Route::post('/member_get_data',[MemberController::class,'get_data'])->name('member_get_data');
 });