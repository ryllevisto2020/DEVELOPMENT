<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Symfony\Component\HttpFoundation\Response;

class ageRestrict
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            //code...
            try {
                //code...
                if($request->query()['age']<18){
                    try {
                        //code...
                        $test=$_COOKIE['authorize'];
                        return redirect()->route('safered');
                    } catch (\Throwable $th) {
                        //throw $th;
                        return response()->json('not safe');
                    }
                }else{
                    setcookie('authorize','true');
                    return redirect()->route('safered');
                }
            } catch (\Throwable $th) {
                //throw $th;
                return $next($request);
            }
    }
}
