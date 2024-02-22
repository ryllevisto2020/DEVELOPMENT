<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/file/Directory', function (Request $request) {
    Storage::makeDirectory("images");//Create Directory
    Storage::makeDirectory("moveimages");//Create Directory

    $file = $request->file('avatar');
    Storage::putFile('images', $file);//Save File to Directory

    $file_all = Storage::files('images');//Get all Files
    foreach ($file_all as $file) {
        $re = '/(images)/m';
        $str = $file;
        $subst = "";

        $result = preg_replace($re, $subst, $str);

        Storage::move("images".$result,"moveImages".$result);//Move Files
    }

    $file_all_ = Storage::files('moveImages');
    foreach ($file_all_ as $file) {
        $re = '/(moveImages)/m';
        $str = $file;
        $subst = "";

        $result = preg_replace($re, $subst, $str);

        Storage::copy("moveImages".$result,"images".$result);//Copy Files
    }


    Storage::delete("images/brZqFpR87avmq7dgYmlvBGwVNfWWh4ja5TxRn5g3.png");//Delete File from directory
});
