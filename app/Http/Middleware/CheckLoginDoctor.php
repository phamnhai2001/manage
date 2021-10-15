<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CheckLoginDoctor
{
    public function handle(Request $request, Closure $next)
        {
            if ($request->session()->exists('doctor')) {  
                return $next($request);
            } else {  
                return Redirect::route('login-doctor')->with("error", "Chưa đăng nhập!");
            }
        }
}
