<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {echo 1;exit;
        if ($guard == 'admin') {
            if (Auth::guard($guard)->check()) {
                if (
                    !Auth::guard($guard)->user() ||
                    (Auth::guard($guard)->user() instanceof MustVerifyEmail &&
                        !Auth::guard($guard)->user()->hasVerifiedEmail())
                ) {
                    return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : Redirect::route('admin.verification.notice');
                }
            }
        }
        return $next($request);
    }
}
