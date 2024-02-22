<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\AUTH;
use Illuminate\Support\Facades\Gate;
class adminCtrl extends Controller
{
    //
    public function index(Request $request){
        if(Gate::allows("isAuthorization",Auth::guard('accountModelGuard'))){
            dd("true");
        }else{
            dd("false");
        }
    }
}











