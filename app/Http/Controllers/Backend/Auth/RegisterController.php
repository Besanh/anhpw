<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdminUser;
use App\Models\Profile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            // profile
            'gender' => 'required|integer',
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'mimes:jpeg,jpg,png,bmp|dimensions:max_width=100,max_height=100,ratio=1',
            'birthday' => 'required|date|before:tomorrow',

            // admin
            'name' => 'required|string||max:255',
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
        try {
            DB::beginTransaction();

            $admin = AdminUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            if ($admin) {
                // Store image
                if ($request->has('avatar')) {
                    $request->file('avatar')->storeAs(
                        'avatar',
                        $admin->id . '_' . $request->file('avatar')->getClientOriginalName()
                    );
                    $avatar = Storage::path('avatar/' . $admin->id . '_' . $request->file('avatar')->getClientOriginalName());
                } else {
                    $avatar = $request->gender == 0 ? asset('/img/undraw_profile.svg') : asset('/img/undraw_profile_3.svg');
                }

                $profile = Profile::create([
                    'user_id' => $admin->id,
                    'gender' => $request->gender,
                    'avatar' => $request->avatar,
                    'birthday' => $request->birthday,
                    'avatar' => $avatar,
                    'fullname' => $request->fullname,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        if ($admin && $profile) {
            // Gui mail xac thuc
            event(new Registered($admin));
            DB::commit();
        } else {
            DB::rollBack();
            return redirect()->back()->with(['msg' => 'Something went wrong']);
        }
        return redirect()->intended($this->redirectTo);
    }
}
