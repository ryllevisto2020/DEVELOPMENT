<?php

use Illuminate\Support\Facades\Route;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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

Route::get('/', function () {
    $key = "visto";
    $payload = [
        "auth"=>true,
    ];
    $encode_payload = JWT::encode($payload, $key,'HS512');

    $decode_payload = JWT::decode("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJhdXRoIjpmYWxzZX0.M3SBUF5tzdrXKAlOF8J7sl4K-xutUcnJt9NXjA4AD_IAJYm-KnG6SAj9IwwB7wCY60clpjdvjcv2MAlX6kduQw", new Key($key,'HS512'));

    dd($decode_payload);/*  {#289 ▼ // routes\web.php:26
                                +"auth": true
                            }*/
});
