<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class registercontroller extends Controller
{
    //
    public function index(){
        return view("register");
    }
    public function insert(Request $request){
        $method = $request->server("REQUEST_METHOD");

        if( $method == "POST"){
            $re_sub = '/|/';
            /*/[^a-z|.@|1234567890]/*/
            $str_sub = $request["data"]["email"];
            $subst = "";
            $result = preg_replace($re_sub, $subst, $str_sub);

            $re = '/(\w+)@(\w+).(\w+)/m';
            $str = $result;
            preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);
            $email_domain_list = [
                'gmail',
                'yahoo',
                'hotmail'
            ];
            dd($matches);
            $email_valid = false;
            for($i = 0; $i < count($email_domain_list); $i++){
                try {
                    if($matches[0][2]==$email_domain_list[$i]){
                        $email_valid = true;
                    }else{

                    }
                } catch (\Throwable $th) {


                }
            }
            try {
                //code...
                $data = [
                    "email"=> $matches[0][0],
                    "password"=>Hash::make($request["data"]["password"]),
                ];
            } catch (\Throwable $th) {
                //throw $th;
            }

            $response = [
            ];
            if($email_valid){
                try {
                    //code...
                    $count = account::all()->where("email", $matches[0][0])->count();
                    if( $count > 0){
                        array_push($response, ["status"=>"failed","info"=>"exist"]);
                    }else{
                        account::create($data);
                        array_push($response, ["status"=>"success","info"=>"added"]);
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                    array_push($response, ["status"=>"failed","info"=>"database"]);
                }
            }else{
                array_push($response, ["status"=>"failed","info"=>"Invalid Email"]);
            }
            return response()->json($response);
        }else{
            return abort(404);
        }
    }
}
