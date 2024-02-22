<?php

use App\Http\Middleware\ageRestriction;
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

//Defining Middleware
//Creating of middleware type 'php artisan make:middleware <name of middleware> example('php artisan make:middleware ageRestriction') -> Go to app\Http\Middleware

//Assigning Middleware To Routes
Route::get('/assign/middleware', function(){

})->middleware(ageRestriction::class); // -> (<name of middleware>::class)
Route::match(['get','post'],'/assign/middleware/response',function(){

})->middleware(ageRestriction::class);

//Register middleware to kernel -> Go to app\Http\Kernel.php
//for individual middleware use protected $middlewareAliases
//for group middleware use protected $middlewareGroups
Route::match(['get','post'],'/assign/middlewares',function(){

})->middleware('age'); // -> (<name of middleware from kernel.php section of $middlewareAliases>) or (<name of middleware from kernel.php section of $middlewareGroups>)

//Middleware Parameters
Route::match(['get','post'],'/assign/middleware/parameter',function(){

})->middleware('age_:adult');
#endregion
