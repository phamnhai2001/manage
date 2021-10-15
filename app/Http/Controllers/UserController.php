<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view("user.login");
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        
        try{
            $user = User::where('email', '=', $email)->first();
            $newPass = $user->password;
            if (Hash::needsRehash($newPass)) {
                $newPass = Hash::make($newPass);
            }

            if (Hash::check($password, $newPass)) {
                $request->session()->put('user', $user);
                $request->session()->put('id', $user->id_customer);
                
                return Redirect::route('welcome')->with('success','Đăng nhập thành công');
            }else{
                return Redirect::route('login-customer')->with('error','Đăng nhập sai');
            }
        }catch(Exception $e){
            return Redirect::route('login-customer')->with('error','Đăng nhập sai');
        }
       
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('welcome');
    }
}
