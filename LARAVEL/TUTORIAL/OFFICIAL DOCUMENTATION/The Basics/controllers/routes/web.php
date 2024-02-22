<?php

use App\Http\Controllers\accountController;
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
//Creating of controllers type 'php artisan make:controller <name of controller> example('php artisan make:controller userController') ->  Go to app\Http\Controllers

//Basic Controllers
Route::get('controllers/basic',[accountController::class,'start']); // -> [<name of controller>::class,<name of function>]

//Controller Middleware
// -> Route::get('/controllers/middleware',[accountController::class,'middleware_'])->middleware();

//Controller Parameter
Route::get('controllers/parameter/{id}',[accountController::class,'parameters']);
#endregion
