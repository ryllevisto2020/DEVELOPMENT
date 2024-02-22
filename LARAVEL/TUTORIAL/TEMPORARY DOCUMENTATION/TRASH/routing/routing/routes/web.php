<?php

use App\Http\Controllers\routecontroller;
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




//Redirect Routes
Route::redirect('/here','/there');
Route::redirect('/here','/there',301);//with 301 code

//View Routes
//vieW('/<name of url>','<name of views>')
//vieW('/<name of url>','<name of views>',['data'=>'data']) pass array to view
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

//Required Parameters
//get('/<name of url>/{parameters}',function(int <variables of paramters>))
Route::get('/user/{id}',function(int $id){
    return 'user number is '.$id;
});
Route::get('/posts/{post}/comments/{comment}', function (string $postId, string $commentId) {
    return 'post number is '.$postId.' with comments: '.$commentId;
});

//Optional Parameters
//get('/<name of url>/{parameters?}',function(?<data types> <variables of paramters>))
Route::get('/users/{name?}', function (?string $name = null) {
    return $name;
});
Route::get('/users/{name?}', function (?string $name = 'John') {
    return $name;
});

//Controller route
//get('/<name of url>',[<name of controller>::class,'name of function from controller']);
Route::get('/controller',[routecontroller::class,'index']);

//Name route
Route::get('/nameroute',function(){
    return "name routed";
})->name('route');
Route::get('/gotoroute',function(){
    return redirect()->route('route');
});

//Route Group
//Result : /group/1
//Result : /group/2
Route::group(['prefix' => 'group'], function() {
    //
    Route::get('/1',function(){
        return "this is 1";
    });
    Route::get("/2",function(){
        return "this is 2";
    });
});

//Route middleware group
//You can use middleware for all of your group
Route::middleware(['auth'])->group(function () {
    Route::get('/1', function () {
        // Uses auth middleware
        return "this is 1";
    });

    Route::get('/2', function () {
        // Uses auth middleware
        return "this is 2";
    });
});

//Route controller group
Route::controller(routecontroller::class)->group(function (){
    Route::get('/first','first'); //get('/<name of url>','<name of function from controller>')
    Route::get('/second','second');
});
