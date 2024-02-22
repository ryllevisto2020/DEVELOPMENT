<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\requestController;
use Illuminate\Support\Facades\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});

#region

//Accessing The Request using dd()
Route::get('/request/access',[requestController::class,'request_access']);

//Request Headers
Route::get('/request/headers',[requestController::class,'request_headers']);
#endregion
