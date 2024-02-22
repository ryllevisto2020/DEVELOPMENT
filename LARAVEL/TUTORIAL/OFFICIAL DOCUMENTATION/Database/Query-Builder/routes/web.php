<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
//   return view('welcome');
//});

#region
//Retrieving All Rows From A Table
Route::get('/query/retrieve/all',function(){
    $db = DB::table('users')->get();
    return response()->json($db);
    //dd($db);
});

//Retrieving A Single Row / Column From A Table
Route::get('/query/retrieve/single',function(){
    //$db = DB::table('users')->where('email','=','breanne63@example.com')->first();
    //$db = DB::table('users')->where('email','=','breanne63@example.com')->pluck('email');
    $db = DB::table('users')->where('email','=','breanne63@example.com')->value('email');
    dd($db);
});

//Specifying A Select Clause
Route::get('/query/select/clause',function(){
    //$db = DB::table('users')->select('email')->where('email','=','breanne63@example.com')->get();
    $db = DB::table('users')->select('email')->get();
    dd($db);
});

//Insert Statements
Route::get('/query/insert',function(){
    $name = fake()->name();
    $email = fake()->email();
    $email_ = fake()->email();
    $email_verified_at = now();
    $pass = Hash::make('password');
    $remember_token = Str::random(10);
    $db = DB::table('users')->insert([
        'email' => $email,
        'name' => $name,
        'email_verified_at' => $email_verified_at,
        'password' => $pass,
        'remember_token' => $remember_token,
        'created_at' => $email_verified_at,
        'updated_at' => $email_verified_at
    ]); // -> Single Insertion

    /*$db = DB::table('users')->insert([
        ['email' => $email_,
        'name' => $name,
        'email_verified_at' => $email_verified_at,
        'password' => $pass,
        'remember_token' => $remember_token,
        'created_at' => $email_verified_at,
        'updated_at' => $email_verified_at],
        ['email' => $email,
        'name' => $name,
        'email_verified_at' => $email_verified_at,
        'password' => $pass,
        'remember_token' => $remember_token,
        'created_at' => $email_verified_at,
        'updated_at' => $email_verified_at]
    ]);*/ // -> Multiple Insertion
    dd($db);
});

//Update Statements
Route::get('/query/update', function(){
    $db = DB::table('users')->where('email', '=','breanne63@example.com')->update(['email' => 'update@example.com']);
    dd($db);
});

//Delete Statements
Route::get('/query/delete',function(){
    $db = DB::table('users')->where('email','=','update@example.com')->delete();
    dd($db);
});
#endregion
