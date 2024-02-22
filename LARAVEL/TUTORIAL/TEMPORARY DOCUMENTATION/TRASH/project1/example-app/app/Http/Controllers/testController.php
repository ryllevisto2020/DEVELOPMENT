<?php

namespace App\Http\Controllers;
require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use App\Models\testModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Throwable;

class testController extends Controller
{
    //
    public function Index(testModel $testModel){
        try {
            //code...
            $test = $testModel->all();
            return view('test',['test' => $test]);
        } catch (\Illuminate\Database\QueryException $th) {
            abort(500);
        }
    }
    public function create(testModel $testModel,Request $request){
        try {
            //code...
            if($_COOKIE['encode_jwt']){
                $key = "vistoinformationtech";
                $hash = hash('md5',$key);
                $decode_jwt = JWT::decode($_COOKIE['encode_jwt'],new Key($hash,'HS256'));
                if($decode_jwt->authorized==true){
                   //dd($request->file('userfile')->getClientOriginalName());
                    //Storage::copy($request->file('userfile')->getClientOriginalName(), 'awd');
                    dd($request->file('userfile')->extension());
                    //return Storage::makeDirectory('laravel');
                    //return Storage::putFileAs('laravel',$file,$name);
                }
                //return response()->json(["awd"=>$decode_jwt]);
            }
        } catch (SignatureInvalidException $SignInvExc) {
            //throw $th;
            return response()->json(["Err_code"=>0,"Err_message"=>"Invalid Signature"]);
        } catch(\ErrorException $ErrorExc){
            return response()->json(["Err_code"=>0,"Err_message"=>"Invalid Token"]);
        }
     }
}
