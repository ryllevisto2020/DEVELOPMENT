<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\userController;
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

#region THE BASIC ROUTING
Route::get('/greeting', function(){
    return "Hello greeting";
});

/*
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
*/

//The Default Route Files
//Creating of controllers type 'php artisan make:controller <name of controller> example('php artisan make:controller userController') ->  Go to app\Http\Controllers
Route::get('/user',[userController::class,'index']); //-> [<name of controller>::class,<name of function>]


//Dependency Injection
Route::get('/dependency',function(Request $request){ //-> function(<name of services/class> $<variable>)
    dd($request);
});

//Redirect Routes
Route::redirect('/here','/greeting');//-> (/<route name>,/<to route name>)

//Permanent Redirect Routes
Route::permanentRedirect('/heres', '/greeting');

//View Routes
//Creating of views type 'php artisan make:view <name of view> example('php artisan make:view login') ->  Go to resources\views
Route::view('/view','welcome'); //-> (/<route name>,<name of view>)

//Required Parameters
Route::get('/paramsrequired/{id}',function(string $id){
    return "the parameter is -> {$id}";
});

//Parameters & Dependency Injection
Route::get('/users/{id}', function (Request $request, string $id) {
    return 'User '.$id;
});

//Optional Parameters
Route::get('/userss/{name?}', function (?string $name = null) {
    return $name;
});

//Named Routes
Route::get('/nameroute',function(){
    return "Hello name route";
})->name('route');

Route::get('/nameroutes/{id}',function(string $id){
    return "Hello name route ".$id;
})->name('routes');

Route::get('/callnameroute',function(){
    return redirect()->route('routes',['id'=>1]);
});

//Route Groups
//Middleware
Route::middleware(['auth'])->group(function(){
    Route::get('/middleware/first', function(){
        return "Middleware First";
    });

    Route::get('/middleware/second', function(){
        return "Middleware Second";
    });
});

Route::controller(userController::class)->group(function(){ //-> controller(<name of controller>::class)
    Route::get('/controller/first','first'); //-> (/<route name>,<name of function>)
    Route::get('/controller/second','second'); //-> (/<route name>,<name of function>)
});

Route::prefix('prefix')->group(function(){ //-> www.example.com/prefix/first
    Route::get('/first',function(){
        return "Prefix First";
    });
    Route::get('/second',function(){
        return "Prefix Second";
    });
});

//www.example.com/<route name>/<{paramater required}>/<{parameter optional?}>
#endregion
