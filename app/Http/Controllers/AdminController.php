<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Admin;


class AdminController extends Controller
{
    
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if (Auth::guard('admin')->attempt($credentials)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect('admin/login');
        }
    }
    public function store()
    {
        //Hash password
        $password = $request->get('password');//lấy pass từ form nhập vào
        $password = Hash::make($password);//mã hóa pass bằng hash
        $admin -> password = $password;//lưu pass đã hash vào db
    }
    

}
