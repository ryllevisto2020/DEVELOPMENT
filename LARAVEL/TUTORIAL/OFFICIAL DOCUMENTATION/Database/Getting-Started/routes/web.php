<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
//    return view('welcome');
//});

#region
//Running A Select Query
Route::get('/db/select', function(){
    $db = DB::select('SELECT * FROM `users`');
    dd($db);
});

//Using Named Bindings
Route::get('/db/bindings', function(){
    $db = DB::select('SELECT * FROM `users` WHERE `email` LIKE :email',['email' => 'xparker@example.com']);
    dd($db);
});

//Running An Insert Statement
Route::get('/db/insert', function(){
    $name = fake()->name();
    $email = fake()->email();
    $email_verified_at = now();
    $pass = Hash::make('password');
    $remember_token = Str::random(10);
    $db = DB::insert('INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
    VALUES (NULL, "'.$name.'" , "'.$email.'", "'.$email_verified_at.'", "'.$pass.'", "'.$remember_token.'", "'.$email_verified_at.'", "'.$email_verified_at.'")');
    dd($db);
});

//Running An Update Statement
Route::get('/db/update',function(){
    $db = DB::update('UPDATE `users` SET `email` = :email_update WHERE `users`.`id` = 16',['email_update'=>'testawd']);
    dd($db);
});

//Running A Delete Statement
Route::get('/db/delete',function(){
    $db = DB::delete('DELETE FROM `users` WHERE `users`.`id` = 1');
    dd($db);
});
#endregion
