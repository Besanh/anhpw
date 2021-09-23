<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next, $guard = 'admin')
    // {
    //     if(!Auth::guard($guard))
    //     {
    //         return view('admin.auth.login');
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->guest('/admin/login');
    }
}
