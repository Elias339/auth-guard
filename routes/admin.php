<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;


Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login','backend.admin.auth.login')->name('login');
        Route::view('/register','backend.admin.auth.register')->name('register');
        Route::post('/create',[AdminController::class,'create'])->name('create');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home','backend.admin.auth.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });
});
