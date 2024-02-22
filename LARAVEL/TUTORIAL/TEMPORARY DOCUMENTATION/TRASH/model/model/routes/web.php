<?php

use App\Models\samplemodel;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request,samplemodel $samplemodel) {

    //Insert from database
    /*$samplemodel->create([
        'name'=> $request['name'],
        'username'=>$request['username'],
        'password'=>$request['password']
    ]);*/

    //Insert from database
    $insert = $samplemodel;
    $insert->name="vistoa";
    $insert->username="admian";
    $insert->password="admin";
    //$insert->save();

    //Get all data from database
    $samplemodel->all();

    //Get data according to query
    $samplemodel->all()->where('username','=', "admin"); //where('<name of column>','<operator>','<value>')

    //Update data
    //$update_name = $samplemodel->find(1); //find('<id>')
    //$update_name->name="usawdawdawder";
    //$update_name->save();

    //Update multiple data
    //$samplemodel->where("username","admin")->update(['name'=>'u']); //where('<name of column>','<operator>','<value>')->update(['<name of column>'=>'<value>'])

    //Delete Data
    //$samplemodel->find(1)->delete(); //find('<id>')

    //Delete multiple data
    //$samplemodel->where("username","admin")->delete(); //where('<name of column>','<operator>','<value>')->delete()

    //Get all data using single value with %<value>%
    $samplemodel->where("username", "like", "%" . "a" . "%")->get();

    return response()->json($samplemodel->where("username", "like", "%" . "" . "%")->get());
});
