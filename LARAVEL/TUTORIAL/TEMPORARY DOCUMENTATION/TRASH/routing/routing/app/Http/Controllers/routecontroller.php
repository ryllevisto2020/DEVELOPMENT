<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routecontroller extends Controller
{
    //
    public function index(){
        return "route from controller";
    }

    public function first(){
        return "route from first";
    }
    public function second(){
        return "route from second";
    }
}
