<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logincontroller extends Controller
{
    //
    public function index(){
        return view("login");
    }

    public function login(Request $request){
        $method = $request->server("REQUEST_METHOD");
        if($method == "POST"){

        }else{
            return abort(404);
        }
    }
}
