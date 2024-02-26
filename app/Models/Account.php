<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;
    public $timestamps = false;
    protected $fillable = ['email', 'password'];
}
