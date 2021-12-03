<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('username')) {
            return redirect()->route('admin.login')->with('msgErr', 'Chưa đăng nhập');
        }
        return $next($request);
    }
    
}
