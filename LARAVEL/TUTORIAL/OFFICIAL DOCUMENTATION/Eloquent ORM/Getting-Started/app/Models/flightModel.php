<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flightModel extends Model
{
    use HasFactory;

    //Table Names
    protected $table = 'flight_models'; // -> Specified your table name here for example (protected $table = 'ThisIsMyDataTable')

    //Time Stamps
    public $timestamps = false; // -> if you don't want to display the CREATED_AT and UPDATED_AT columns in your data table

    //Fillable Property
    protected $fillable = [
        'flight_name','flight_dest','flight_from'
    ];
}
