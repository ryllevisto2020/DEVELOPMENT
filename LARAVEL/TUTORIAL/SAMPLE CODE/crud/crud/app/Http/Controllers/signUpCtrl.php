<?php

namespace App\Http\Controllers;

use App\Models\accountModel;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class signUpCtrl extends Controller
{
    //
    public function action_signUp(Request $request){
        //Retrieve Get Request Query
        $age = $request->query("age");
        $name = $request->query("name");
        $email = $request->query("email");
        $password = $request->query("password");
        //Validate Request
        $error = [];
        if(is_numeric($age) && !is_null($age)){
            //
        }else{
            array_push($error,new error("0x1_age","Invalid Age!"));
        }

        if(!is_null($name)){
            //
        }else{
            array_push($error,new error("0x1_name","Invalid Name!"));
        }

        if(!is_null($email)){
            //
        }else{
            array_push($error,new error("0x1_email","Invalid Email!"));
        }
        if(!is_null($password)){
            //
        }else{
            array_push($error,new error("0x1_password","Invalid Password!"));
        }
        if(sizeof($error) == 0){
            //Check if Data is Exists
            try {
                //code...
                if(accountModel::all()->where("email","=","$email")->count() > 0){
                    array_push($error,new error("0x1_exist","Email is already Exist!"));
                    return response()->json(["error"=>$error]);
                }else{
                    //Insert Data to account_models table
                    try {
                        //code...
                        accountModel::create([
                            "age"=>$age,
                            "name"=>$name,
                            "email"=>$email,
                            "password"=>HASH::make($password)
                        ]);
                        return response()->json(["success"=>["code"=>"0x2","message"=>"Successfully Registered!"]]);
                    } catch (\Throwable $th) {
                        //throw $th;
                        if($th->getCode() == 2002){
                            array_push($error,new error("0x1_connection","Database Error!"));
                            return response()->json(["error"=>$error]);
                        }
                    }
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
