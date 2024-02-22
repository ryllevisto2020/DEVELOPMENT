<?php

use App\Http\Controllers\loginAndSigninController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
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
    //dd(Storage::get(''));
    return response()->view('loginAndsignin',['post'=>Storage::allFiles('laravel-file')]);
});
Route::post('/insert',[loginAndSigninController::class, 'signIn'])->name('insertRoute');
Route::get('/middle',[loginAndSigninController::class,'middle'])->middleware(['ageRestrict']);
Route::get('/safe',[loginAndSigninController::class,'safe'])
->name('safered');
Route::get('/gates',[loginAndSigninController::class,'gate'])
->name('gated');
Route::post('/file',[loginAndSigninController::class,'file']);
