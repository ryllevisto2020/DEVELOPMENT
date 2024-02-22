<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ageRestrict;
use App\Models\creds_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\Insert;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class loginAndSigninController extends Controller
{
    //
    public $_insert;
    public function __construct(Insert $insert){
        $this->_insert = $insert;

    }
    public function signIn(Request $request){
        $this->_insert->test($request);
        /*$request = Request::capture();
        $user = $request['data']['user'];
        $pass = Hash::make($request['data']['pass']);
        creds_info::create([
            "username"=>$user,
            "password"=>$pass
        ]);
        dd(creds_info::all('username')->where('username','=','ad'));*/
        return response()->json('awd');
    }

    public function middle(){
        try {
            $test=$_COOKIE['authorize'];
            return redirect()->route('safered');

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('You are not Authorize to access this!');
        }
    }
    public function safe(){
        try {
            //code...
            $test=$_COOKIE['authorize'];
            return response()->json($test);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json('You are not Authorize to access this!');
        }
    }

    public function gate(creds_info $post){

        // dd($post->all());
         $creds = [
             'username'=>"admin",
             'password'=>"admin"
         ];
        Auth::guard('creds_info')->attempt($creds);
       if (!Gate::allows('update_post', $post->all()[0])) {
        abort(403);
        }else{
            return response()->json('awd');
        }

    }

    public function file(Request $request){
        try {
            //code...
            $file = $request->file('fileUp');
            $extension = $file->getClientOriginalExtension();
            if($extension=="jpeg" || $extension=="png" || $extension=="gif" || $extension=="jpg" || $extension=="docx"){
                Storage::makeDirectory("laravel-file");
                Storage::putFileAs('laravel-file',$file,$file->hashName());
                $message = [
                    'code'=>1,
                    'message'=>"File Saved!"
                ];
                return response()->json($message);
            }else{
                $message = [
                    'code'=>0,
                    'message'=>"Invalid File Extension!"
                ];
                return response()->json($message);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
        /*$file = $request->file('fileUp');
        $file_name = $file->getClientOriginalName();
        $re = '/[.]|(png|jpeg|gif|jpg)/m';
        $str = $file_name;
        $subst = "";

        $result = preg_replace($re, $subst, $str);
        $hashFile = hash::make($result);
        $extension = $file->getClientOriginalExtension();
        //dd($extension);
        $finalFileName = $hashFile.".".$extension;
        Storage::makeDirectory("laravel-file");
        Storage::putFileAs('laravel-file',$file,$file->hashName());
        $t = Storage::allFiles('laravel-file');
        dd($t);
        //dd($_POST,$_FILES,$a);*/
    }
}
