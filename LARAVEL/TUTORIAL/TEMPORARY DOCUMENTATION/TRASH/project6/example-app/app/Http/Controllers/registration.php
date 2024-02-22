<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
class registration extends Controller
{
    //
    public function index(){
        return view("registration");
    }
    public function addaccount(Request $request){
        Account::create([
            "name"=> $request["data"]["name"],
            "email"=> $request["data"]["email"],
            "password"=> Hash::make($request["data"]["password"]),
        ]);
        dd(Account::all());
    }
}
 