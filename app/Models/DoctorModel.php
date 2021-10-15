<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpecialistModel;

class DoctorModel extends Model
{
    use HasFactory;

    protected $table = "doctors";

    public $timestamps = false;

    public $primaryKey = 'id_doctor';

    public function getGenderNameAttribute()
    {
        if ($this->gender == 0) {
            return 'Nữ';
        } else {
            return 'Nam';
        }
    }

    
    public function specialist(){
        return $this->belongsTo(SpecialistModel::class, 'id_specialist','id_specialist');
        
    }
}
