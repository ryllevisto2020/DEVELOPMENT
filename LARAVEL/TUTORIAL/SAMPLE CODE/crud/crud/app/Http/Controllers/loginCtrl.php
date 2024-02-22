<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class loginCtrl extends Controller
{
    //
    public function action_login(Request $request){
        //Retrieve Get Request Query
        $userEmail = $request->query("userEmail");
        $password = $request->query("password");
        //Validate Request
        $error = [];
        if(!is_null($password)){
            //
        }else{
            array_push($error,new error("0x1_login_password","Invalid Password!"));
        }
        if(!is_null($userEmail)){
            //
        }else{
            array_push($error,new error("0x1_login_email_username","Invalid Email!"));
        }
        if(sizeof($error) == 0){
            try {
                //code...
                $data = [
                    "email" => $userEmail,
                    "password" => $password,
                ];
                if(Auth::guard("accountModelGuard")->attempt($data)){
                    return response()->json(["success"=>["code"=>"0x2","message"=>"Login Success!"]]);
                }else{
                    array_push($error,new error("0x1_login_Incorrect","Incorrect Email/Password!"));
                    return response()->json(["error"=>$error]);
                }
            } catch (\Throwable $th) {
                //throw $th;
                if($th->getCode() == 2002){
                    array_push($error,new error("0x1_connection","Database Error!"));
                    return response()->json(["error"=>$error]);
                }
            }
        }else{
            return response()->json(["error"=>$error]);
        }
    }
}
class error{
    public $err_code;
    public $err_message;
    public function __construct($err_code_,$err_message_){
        $this->err_code = $err_code_;
        $this->err_message = $err_message_;
    }
}
