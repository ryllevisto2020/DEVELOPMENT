<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class samplemodel extends Model
{
    use HasFactory;
    protected $table = "samplemodel";
    protected $fillable = [
        "name","username","password"
    ];
}
