<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        return view("admin.login");
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try{
            $admin = Admin::where('email', '=', $email)->first();//Select những admin có email = email
            $newPass = $admin->password;//password của admin trong db
            if (Hash::needsRehash($newPass)) {//nếu pass chưa đc Hash thì Hash
                $newPass = Hash::make($newPass);
            }

            if (Hash::check($password, $newPass)) {//Kiểm tra password nhập vào từ form = pass đã mã hóa trong db
                // code...
                $request->session()->put('admin', $admin);
                return Redirect::route('dashboard')->with('success','Đăng nhập thành công');//nếu bằng thì ok
            }else{
                return Redirect::route('login')->with('error','Đăng nhập sai');//Nếu ko có pass trùng thì lỗi
            }
        }catch(Exception $e){
            return Redirect::route('login')->with('error','Đăng nhập sai');//nếu ko có email thì lỗi
        }

    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('login');
    }
}
