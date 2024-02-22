<?php

use App\Models\flightModel;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

#region
//Generating Model Classes
// -> Create a new model class type 'php artisan make:model <name of model>' -> example -> php artisan make:model flightModel

// -> You can also create a new model class with Migrations,seed,factories and controllers (for migrations type '-m' , for seed type '-s' , for factories type '-f' , for controler type '-c')
// -> example -> php artisan make:model flightModel -m -> flightModel with Migrations -> go to 'database/migrations' directory and find your created Migrations
// -> example -> php artisan make:model flightModel -s -> flightModel with Seeds -> go to 'database/seeders' directory and find your created Seeds
// -> example -> php artisan make:model flightModel -f -> flightModel with Factories -> go to 'database/factories' directory and find your created Factories
// -> example -> php artisan make:model flightModel -c -> flightModel with Controllers -> go to 'app/Http/Controllers' directory and find your created Controllers

//Eloquent Model Conventions
// for configuration of your models go to 'app/Models' directory and find your created models

// -> Config your Migrations of your models
// -> if you want a dummy data go to your Factories and Seeders this is optional only

// put some data in your database table for your testing

//Retrieving All row Models
Route::get('/eloquent/retrieve',function(flightModel $flightModel){
    $eloquent = $flightModel->get();
    dd($eloquent);
});

//Retrieving Single row Models
Route::get('/eloquent/retrieve/single',function(flightModel $flightModel){
    $eloquent = $flightModel->all()->where('flight_from','=','TWN');
    dd($eloquent);
});

//Insert Models
Route::get('/eloquent/insert',function(flightModel $flightModel){
    // 1st method using create() method and fillable property in models
    // if you use create() methods to insert data first you need to create
    // Fillable Property in your models
    /*$eloquent = $flightModel->create([
        'flight_name' => 'awd',
        'flight_dest' => 'PHL',
        'flight_from' => 'JPN',
    ]);*/

    // 2nd method using creating new model object
    $new_flightModel = new flightModel;
    $eloquent = (
        [
            $new_flightModel->flight_name = "awd",
            $new_flightModel->flight_dest = 'awd',
            $new_flightModel->flight_from = 'awd',
            $new_flightModel->save()
        ]
    );
    dd($eloquent);
});

//Update Models
Route::get('/eloquent/update',function(flightModel $flightModel){
    // 1st Method
    /*$eloquent = $flightModel->all()->where('flight_from','=','TWN')->first();
    $eloquent->flight_from = "test";
    $eloquent->update();*/

    // 2nd Method
    $eloquent = $flightModel->where('flight_from','=','test')->update(['flight_dest'=>'awd']);
    dd($eloquent);
});

//Delete Models
Route::get('/eloquent/delete',function(flightModel $flightModel){
    $eloquent = $flightModel->where('flight_from','=','test')->delete();
    dd($eloquent);
});
#endregion
