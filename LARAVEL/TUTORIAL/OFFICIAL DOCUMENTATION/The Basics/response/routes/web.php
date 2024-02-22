<?php

use App\Models\User;
use Illuminate\Support\Facades\Cookie;
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
//Strings & Arrays
Route::get('/response/string',function(){
    return "this is a string";
})->name('string');
Route::get('/response/array',function(){
    return ["this","is","a","array"];
});

//Response Objects
Route::get('/response/objects',function(){
    return response("Hello World!",200) // -> response(<return value(string,array etc)>,<status code(200,301 etc)>)
    ->header('Content-Type', 'application/json') // -> header(<custom key/defined key>,<custom value/defined value>)
    ->header('custom-header',"custom value");
});

//Eloquent Models & Collections\
Route::get('/response/eloquent',function(User $user){
    dd($user);
    return $user;
});

//Attaching Headers To Responses
Route::get('/response/headers',function(){
    return response("Hello World!",200)
    ->withHeaders([
        'Content-Type' => 'application/json',
        'Custom-Header' => 'Custom-Value',
    ]);
});

Route::get('/response/header',function(){
    return response("Hello World!",200)
    ->header('Content-Type', 'application/json')
    ->Header('Custom-Header','Custom-Value');
});

//Attaching Cookies To Responses
Route::get('/response/cookie',function(){
    return response("Hello World!",200)->cookie('sample-cookie','sample-value'); // -> cookie(<name of cookie key>,<value of cookie>) -> set cookie
});

Route::get('/response/cookies',function(){
    Cookie::queue('sample-cookies','sample-values'); // -> ::queue(<name of cookie key>,<value of cookie>) -> set cookie
    //Cookie::unqueue('sample-cookies'); // -> ::unqueue(<name of cookie key>) -> remove cookie
    return  response("Hello World!",200);
});

//Redirects
Route::get('/response/redirects',function(){
    return redirect('/response/string');
});

//Redirecting To Named Routes
Route::get('/response/redirects/nameroutes',function(){
    return redirect()->route('string'); // -> route(<name of route>)
});

//Redirecting To Controller Actions
Route::get('/response/redirects/controller',function(){
    //return redirect()->action([UserController::class,'index']); // -> action([<name of controller>::class,<name of function>])
});
#endregion
