<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){
    Route::get('login', function(){
        return view('admin.auth.login');
    });
    Route::get('register', function(){
        return view('admin.auth.register');
    });

    Route::get('logout', [LoginController::class, 'logout']);
    Route::post('signup', [RegisterController::class, 'generalRegister']);
    
    Route::group(['middleware' => ['auth']], function() {
        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');

        Route::group(['middleware' => ['verified']], function() {
            Route::get('dashboard', [DashboardController::class,'index']);

            Route::group(['prefix' => 'user'], function(){
                Route::get('/', [UserController::class,'index']);
                Route::get('home', [UserController::class,'index']);
                Route::get('create', [UserController::class,'create']);
                Route::post('store', [UserController::class,'store']);
                Route::get('edit/{id}', [UserController::class,'edit']);
                Route::post('update/{id}', [UserController::class,'update']);
                Route::get('delete/{id}', [UserController::class,'destroy']);
            });

            Route::group(['prefix' => 'sa'], function(){
                Route::get('/', [UserController::class,'indexsa']);
                Route::get('home', [UserController::class,'indexsa']);
                Route::get('create', [UserController::class,'createsa']);
                Route::post('store', [UserController::class,'store']);
                Route::get('edit/{id}', [UserController::class,'editsa']);
                Route::post('update/{id}', [UserController::class,'update']);
                Route::get('delete/{id}', [UserController::class,'destroy']);
            });
        });
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
