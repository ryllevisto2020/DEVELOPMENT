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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Response String and Arrays
Route::get('/string', function () {
    return 'Hello World';
});
Route::get('/arrays', function () {
    return [1,2,3,4];
});

//Response View with Data
//view('<name of view'>,['<name of key>'=>'<value>'])
Route::get('/view', function () {
    return response()
    ->view('welcome',["data"=>[["name"=>"visto"],["name"=>"dulay"]]]);
    //->json([["name"=>"visto","age"=> "21"],["name"=>"dulay","age"=> "21"]]);
});

//Response JSON
//json(['<name of key>'=>'<value>'])
Route::get('/json', function () {
    return response()
    ->json(["data"=>"data"]);
});

//Response Redirect with Data and Session
Route::get('/sample', function () {
    return response()
    ->view('welcome',Session::all()['data']);
});
Route::get('/redirect', function () {
    Session::put('data',["data"=>[["name"=>"visto"],["name"=>"awd"]]]);
    Session::save();
    return redirect('/sample');
});
