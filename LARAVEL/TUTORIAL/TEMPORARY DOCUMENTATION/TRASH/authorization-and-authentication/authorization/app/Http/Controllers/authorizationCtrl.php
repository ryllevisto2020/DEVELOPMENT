<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class authorizationCtrl extends Controller
{
    //
    public function index(Request $request){
        dd("This is Authorization");
    }
    public function login(){
        Auth::guard('accountModelGuard')->attempt([
            'username'=>"admin",
            'password'=>"admin"
        ]);
    }
    public function logout(){
        Auth::guard('accountModelGuard')->logout();
    }
}











