<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/dashboard';

    protected $logoutRedirectTo = '/admin/login';

    protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware('guest')->except('adminLogout');
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function postAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->intended($this->redirectTo);
        }
        return back()->with('error', 'Login fail. Please try again');
        // return back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect($this->logoutRedirectTo);

        // if (Auth::guard('admin')->check()) // this means that the admin was logged in.
        // {
        //     Auth::guard('admin')->logout();
        //     return redirect()->route('admin-login');
        // }

        // $this->guard()->logout();
        // $request->session()->invalidate();

        // return $this->loggedOut($request) ?: redirect('/');
    }
}
