<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $table = 'user_data';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $fillable = [
        'user_name', 'user_email', 'user_pwd','user_language','user_image'
    ];
}
