<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterModel extends Model
{
    use HasFactory;

    protected $table = "customer";

    public $timestamps = false;
    
    public $primaryKey = 'id_customer';

    
}