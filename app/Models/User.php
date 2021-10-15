<?php

namespace App\Models;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable; 
// use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use HasFactory;
    use Notifiable;
    
    protected $table ="customer";

    protected $fillable = [
     'email', 'password',
];

protected $hidden = [
    'password', 'remember_token',
];
}