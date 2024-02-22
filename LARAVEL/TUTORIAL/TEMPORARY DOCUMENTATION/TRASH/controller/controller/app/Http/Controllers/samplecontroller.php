<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class samplecontroller extends Controller
{
    //
    public function index(){
        return "this is controller";
    }
    public function first(){
        return "this is first from controller";
    }
    public function second(){
        return "this is second from controller";
    }

    public function view(){
        return view('welcome');
    }
}
