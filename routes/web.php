<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Deliveryman\DeliverymanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('customer')->name('customer.')->group(function(){
    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login','backend.customer.auth.login')->name('login');
        Route::view('/register','backend.customer.auth.register')->name('register');
        Route::post('/create',[CustomerController::class,'create'])->name('create');
        Route::post('/check',[CustomerController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web'])->group(function(){
        Route::view('/home','backend.customer.auth.home')->name('home');
        Route::post('/logout',[CustomerController::class,'logout'])->name('logout');
    });
});



Route::prefix('seller')->name('seller.')->group(function(){
    Route::middleware(['guest:seller'])->group(function(){
        Route::view('/login','backend.seller.auth.login')->name('login');
        Route::view('/register','backend.seller.auth.register')->name('register');
        Route::post('/create',[SellerController::class,'create'])->name('create');
        Route::post('/check',[SellerController::class,'check'])->name('check');
    });

    Route::middleware(['auth:seller'])->group(function(){
        Route::view('/home','backend.seller.auth.home')->name('home');
        Route::post('/logout',[SellerController::class,'logout'])->name('logout');
    });
});


Route::prefix('deliveryman')->name('deliveryman.')->group(function(){
    Route::middleware(['guest:deliveryman'])->group(function(){
        Route::view('/login','backend.deliveryman.auth.login')->name('login');
        Route::view('/register','backend.deliveryman.auth.register')->name('register');
        Route::post('/create',[DeliverymanController::class,'create'])->name('create');
        Route::post('/check',[DeliverymanController::class,'check'])->name('check');
    });

    Route::middleware(['auth:deliveryman'])->group(function(){
        Route::view('/home','backend.deliveryman.auth.home')->name('home');
        Route::post('/logout',[DeliverymanController::class,'logout'])->name('logout');
    });
});








Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
