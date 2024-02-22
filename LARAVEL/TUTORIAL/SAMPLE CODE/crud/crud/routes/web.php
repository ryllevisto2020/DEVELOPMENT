<?php

use App\Http\Controllers\loginCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signUpCtrl;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return view('login');
})->name('index')->middleware('check');

Route::get('/home',function(){
    dd("test");
})->middleware('auth:accountModelGuard')->name('home');

Route::get('/logout',function(){
    Auth::guard("accountModelGuard")->logout();
    return redirect()->route('index');
})->middleware('auth:accountModelGuard');

//ACTION
Route::get('/signup', [signUpCtrl::class,'action_signUp'])->name('signUp')->middleware('check');;
Route::get('/login', [loginCtrl::class,'action_login'])->name('login')->middleware('check');;

