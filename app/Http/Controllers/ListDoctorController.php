<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use App\Models\SpecialistModel;
use Illuminate\Http\Request;
use Exception;

class ListDoctorController extends Controller
{
    public function index()
    {


        $specialist = SpecialistModel::all();
        $doctor = DoctorModel::all();
        return view('user.doctor', [
            'specialist' => $specialist,
            'doctor' => $doctor,

        ]);
    }
    public function list_doctor($id_specialist)
    {
        try {
            $check = SpecialistModel::where('id_specialist', $id_specialist)->firstOrfail();
            $specialist = SpecialistModel::all();
            $doctor = DoctorModel::where('id_specialist', $id_specialist)->get();
            return view('user.doctor', [
                'specialist' => $specialist,
                'doctor' => $doctor,
                'check' => $check,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi!');
        }
    }
}
