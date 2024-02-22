<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class testModel extends Authenticatable
{
    use HasFactory;
    protected $table = "test_models";
    protected $guard = "testGuard";
    public $timestamps = false;
}
