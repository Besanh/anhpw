<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdminUser;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = "/admin/dashboard";

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:admin_users|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);
    }

    public function showAdminRegisterForm()
    {
        return view('admin.auth.register');
    }

    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        AdminUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->intended($this->redirectTo);
    }
}
