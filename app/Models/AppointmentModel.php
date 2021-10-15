<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;

    protected $table = "appointment_schedule";

    public $timestamps = false;
    
    public $primaryKey = 'id';

    public function time(){
        return $this->belongsTo(TimeModel::class, 'id_time','id_time');
        
    }

    public function doctor(){
        return $this->belongsTo(DoctorModel::class, 'id_doctor','id_doctor');
        
    }

    public function customer(){
        return $this->belongsTo(CustomerModel::class, 'id_customer','id_customer');
        
    }
}
