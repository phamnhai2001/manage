<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeModel extends Model
{
    use HasFactory;

    protected $table = "time_slot";

    public $timestamps = false;
    
    public $primaryKey = 'id_time';
}
