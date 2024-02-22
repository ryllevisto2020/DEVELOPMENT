<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;
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

Route::get('/create', function () {
    Cookie::queue('name','visto');//Create Cookie
});

Route::get('/delete', function () {
    Cookie::queue(Cookie::forget("name"));//Delete Cookie
});

Route::get('/get', function () {
    dd(Cookie::get('name'));//Get Cookie
});

Route::get('/session/create', function (Request $request) {
    Session::put('name','visto rylle');//Create Session
    Session::save();
});

Route::get('/session/get', function (Request $request) {
    dd(Session::all());//Get Session
});

Route::get('/session/delete', function (Request $request) {
    Session::forget('name');//Delete Session
    Session::save();
});
