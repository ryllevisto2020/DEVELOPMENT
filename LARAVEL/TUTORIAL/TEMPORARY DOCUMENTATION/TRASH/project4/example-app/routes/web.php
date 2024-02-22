<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;
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
Route::get('/login',[logincontroller::class,'index'])->name('login');
Route::post('/login/validate',[logincontroller::class,'login'])->name('login_validate');
Route::get('/login/validate',[logincontroller::class,'login'])->name('login_validate');

Route::get('/register',[registercontroller::class,'index'])->name('register');
Route::post('/register/insert',[registercontroller::class,'insert'])->name('register_insert');
Route::get('/register/insert',[registercontroller::class,'insert'])->name('register_insert');
