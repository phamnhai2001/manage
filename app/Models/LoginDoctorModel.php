<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 

class LoginDoctorModel extends Model
{
    use HasFactory;
    use Notifiable;
    
    protected $table ="doctors";
    
    protected $fillable = [
     'email', 'password',
];

protected $hidden = [
    'password', 'remember_token',
];
}
