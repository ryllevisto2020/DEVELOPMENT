<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
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
Route::get('/response', function () {

    //RESPONSE

    //view with data
    //return response()->view('welcome',["data" =>"val_1"]);

    //view
    //return response()->view('welcome');

    //json
    //$array = ([["key_1"=>"val_1"],["key_2"=>"val_2","key_3"=>["key_4"=>"val_4"]]]);
    //return response()->json($array);

    //header
    //return response("test")->withHeaders(['withHeaders' => 'val_1']);
    //return response("test")->header('header','val_1');

    //cookie
    //$cookie = cookie('cookie','val_1');
    //return response("test")->cookie($cookie);




    //REDIRECT
    //return redirect('https://www.google.com'); //-> URL or PATH

    //to
    //return redirect()->to('https://www.google.com'); //-> URL or PATH

    //away
    //return redirect()->away('https://www.google.com'); //-> URL or PATH

    //route
    //return redirect()->route("route");
    //return redirect()->route('routeParams',["id"=>2]);
});

Route::get('/response/route',function(){
    return response("this is route");
})->name("route");

Route::get('/response/route/params/{id}',function(string $id){
    return response("this is route {$id}");
})->name('routeParams');
