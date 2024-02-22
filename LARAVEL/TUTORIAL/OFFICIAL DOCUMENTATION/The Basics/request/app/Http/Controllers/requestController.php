<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestController extends Controller
{
    //
    public function request_access(Request $request){
        dd($request);
    }

    public function request_headers(Request $request){
        $request->headers->set('custom-header','this is value of custom header');
        dd($request);
    }
}
