<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('/session', function(){
    Session::put('session-key','session-value'); // -> ::put(<name of session key>,<value of session key>) -> set session
    Session::save();  // -> Save session

    Session::forget('session-key'); // -> ::forget(<name of session key>) -> remove session

    //dd(Session::get('session-key')); // -> ::get(<name of session key>) -> get session value
});
#endregion
