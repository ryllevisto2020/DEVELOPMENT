<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountController extends Controller
{
    //
    //Create function for this controller
    public function start(){
        return "this is start function";
    }

    public function middleware_(){
        return "this is middleware function";
    }

    public function parameters(string $id){
        return "this is ". $id ." parameters function";
    }
}
