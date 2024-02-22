<?php

use App\Http\Controllers\samplecontroller;
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

Route::get('/controller',[samplecontroller::class,'index'])->name('index');
Route::get('/controller/first',[samplecontroller::class,'first'])->name('first');
Route::get('/controller/second',[samplecontroller::class,'second'])->name('second');
Route::get('/controller/view',[samplecontroller::class,'view'])->name('view');
