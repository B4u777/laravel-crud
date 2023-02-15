<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signin extends Model
{
    protected $table = 'sigin';
    public $timestamps = false;
    protected $fillable = [
        'user_name', 'user_email', 'user_password'
    ];
}
