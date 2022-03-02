<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;


Route::name('doctor.')->namespace('Doctor')->prefix('doctor')->group(function(){

    Route::namespace('Auth')->middleware('guest:doctor')->group(function(){
        //login route
        Route::get('/login', [DoctorController::class, 'login'])->name('login');
        Route::post('/login', [DoctorController::class, 'processLogin']);
        });

    Route::namespace('Auth')->middleware('auth:doctor')->group(function(){
        Route::view('home', 'doctor.auth.home');
        Route::post('/logout',function(){
        Auth::guard('doctor')->logout();
        return redirect()->action([
            DoctorController::class,
        'login'
        ]);
        })->name('logout');

    });

});
