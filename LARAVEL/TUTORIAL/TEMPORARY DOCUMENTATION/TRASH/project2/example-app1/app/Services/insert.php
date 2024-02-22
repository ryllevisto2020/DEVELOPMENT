<?php
namespace App\Services;
use Illuminate\Http\Request;
use App\Models\creds_info;
use Illuminate\Support\Facades\Hash;
class Insert{
    public function test(Request $request){
        $user = $request['data']['user'];
        $pass = Hash::make($request['data']['pass']);
        creds_info::create([
            "username"=>$user,
            "password"=>$pass
        ]);
    }
}
