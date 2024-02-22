<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
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
Route::any('/request/{id}',function (string $id) {
    $request = Request::capture();

    //REQUEST

    //query
    //dd($request->query); //-> localhost/request?id=1

    //parameters
    //dd($id); //-> localhost/request/1

    //headers
    //dd($request->headers);

    //body,form data,x-www-form-urlencoded
    //dd($request);

    //cookies
    //dd($request->cookies);
});
