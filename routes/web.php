<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\GroupinsController;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UomController;
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
        Route::post('/member_destroy',[MemberController::class,'destroy'])->name('member_destroy');
        Route::get('/member_add_form',[MemberController::class,'add_form'])->name('member_add_form');
        Route::get('/member_kartu/{id}',[MemberController::class,'kartu'])->name('member_kartu');
        Route::post('/member_get_data',[MemberController::class,'get_data'])->name('member_get_data');

      //master-bank
        Route::get('/bank',[BankController::class,'index'])->name('bank');
        Route::get('/bank_list',[BankController::class,'datalist'])->name('bank_list');
        Route::post('/bank_save',[BankController::class,'save'])->name('bank_save');
        Route::post('/bank_destroy',[BankController::class,'destroy'])->name('bank_destroy');
        Route::post('/bank_get_data',[BankController::class,'get_data'])->name('bank_get_data');

      //master-uom
        Route::get('/uom',[UomController::class,'index'])->name('uom');
        Route::get('/uom_list',[UomController::class,'datalist'])->name('uom_list');
        Route::post('/uom_save',[UomController::class,'save'])->name('uom_save');
        Route::post('/uom_destroy',[UomController::class,'destroy'])->name('uom_destroy');
        Route::post('/uom_get_data',[UomController::class,'get_data'])->name('uom_get_data');

     //master-instruktur
        Route::get('/instruktur',[InstrukturController::class,'index'])->name('instruktur');
        Route::get('/instruktur_list',[InstrukturController::class,'datalist'])->name('instruktur_list');
        Route::post('/instruktur_save',[InstrukturController::class,'save'])->name('instruktur_save');
        Route::post('/destroy',[InstrukturController::class,'destroy'])->name('instruktur_destroy');
        Route::post('/instruktur_get_data',[InstrukturController::class,'get_data'])->name('instruktur_get_data');
        Route::get('/instruktur_add_form',[InstrukturController::class,'add_form'])->name('instruktur_add_form');
        Route::get('/instruktur_kartu/{id}',[InstrukturController::class,'kartu'])->name('instruktur_kartu');
    
   //master-groupins
       Route::get('/groupins',[GroupinsController::class,'index'])->name('groupins');
       Route::get('/groupins_list',[GroupinsController::class,'datalist'])->name('groupins_list');
       Route::post('/groupins_save',[GroupinsController::class,'save'])->name('groupins_save');
       Route::post('/groupins_destroy',[GroupinsController::class,'destroy'])->name('groupins_destroy');
       Route::post('/groupins_get_data',[GroupinsController::class,'get_data'])->name('groupins_get_data');

 });