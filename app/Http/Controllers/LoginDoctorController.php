<?php

namespace App\Http\Controllers;

use App\Models\LoginDoctorModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class LoginDoctorController extends Controller
{
    public function login(){
        return view("doctor.login");
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        // dd($email);
        try{
            $doctor = LoginDoctorModel::where('email', '=', $email)->first();
            $newPass = $doctor->password;
        // dd($doctor);
            if (Hash::needsRehash($newPass)) {
                $newPass = Hash::make($newPass);
            }

            if (Hash::check($password, $newPass)) {
                $request->session()->put('doctor', $doctor);
                $request->session()->put('id', $doctor->id_doctor);

                return Redirect::route('dashboard-doctor')->with('success','Đăng nhập thành công');
            }else{
                return Redirect::route('login-doctor')->with('error','Đăng nhập sai');
            }
        }catch(Exception $e){
            return Redirect::route('login-doctor')->with('error','Đăng nhập sai');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('login-doctor');
    }
}
