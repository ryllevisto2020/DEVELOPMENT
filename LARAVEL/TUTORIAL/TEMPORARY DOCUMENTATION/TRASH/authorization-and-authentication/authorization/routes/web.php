<?php

use App\Http\Controllers\adminCtrl;
use App\Http\Controllers\authorizationCtrl;
use Illuminate\Support\Facades\Route;

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

Route::get('/authorization',[authorizationCtrl::class,'index'])->middleware('auth:accountModelGuard');//->ame('');
Route::get('/login',[authorizationCtrl::class,'login'])->name('login');
Route::get('/logout',[authorizationCtrl::class,'logout'])->name('logout');

Route::get('/admin',[adminCtrl::class,'index'])->middleware('auth:accountModelGuard');//->name('');











