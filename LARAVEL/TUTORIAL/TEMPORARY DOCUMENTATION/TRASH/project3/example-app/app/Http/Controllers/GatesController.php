<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class GatesController extends Controller
{
    //
    public function index(User $user,Post $post){
        try {
            //code...
            if(Gate::allows('admin_only',$user)){
                return view('welcome',["post"=>$post->all()]);
            }else{
                return redirect()->route('out');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    public function auth(){
        auth()->attempt(['email'=>'stan.osinski@example.net','password'=>'password']);
    }
    public function out(){
        auth()->logout();
    }
}
