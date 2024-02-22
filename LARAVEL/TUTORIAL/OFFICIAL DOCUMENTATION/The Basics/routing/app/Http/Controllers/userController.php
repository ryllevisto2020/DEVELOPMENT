<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function index(Request $request){
        return "hello user";
    }

    public function first(Request $request){
        return "Controller first";
    }

    public function second(Request $request){
        return "Controller second";
    }
}
