<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ageRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    //Middleware & Responses
    public function handle(Request $request, Closure $next): Response
    {
        if($request->method()=="GET"){
            return response("This is a GET request");

        }else{
            return response("This is from Another request Method");
        }

    }
}
