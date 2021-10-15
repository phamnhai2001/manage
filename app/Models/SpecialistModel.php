<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistModel extends Model
{
    use HasFactory;

    protected $table = "specialist";

    public $timestamps = false;
    
    public $primaryKey = 'id_specialist';

    // public function doctors(){
    //     return $this->hasMany("DoctorModel::class")
    // }
}
