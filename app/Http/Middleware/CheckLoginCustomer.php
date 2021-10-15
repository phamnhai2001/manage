<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CheckLoginCustomer
{
        public function handle(Request $request, Closure $next)
        {
            // return $next($request);
            if ($request->session()->exists('user')) {  // Nếu có session 
                return $next($request);
            } else { // Nếu không tồn tại 
                return Redirect::route('login-customer')->with("error", "Chưa đăng nhập");
            }
        }
    }
