<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Backend\AdminUser;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-show', ['only' => ['show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AdminUser::orderBy('id', 'DESC')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AdminUser $user)
    {
        $this->validatorStore($request->all())->validate();

        try {
            DB::beginTransaction();
            $admin = AdminUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            if ($admin) {
                // Store image
                if ($request->hasFile('avatar')) {
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
            DB::commit();
        } else {
            DB::rollBack();
            return redirect()->back()->with(['msg' => 'Something went wrong']);
        }
        return redirect()->back()->with('message', 'Created user successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdminUser $user)
    {
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminUser $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles()->pluck('name', 'name')->all();
        return view('admin.user.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $user)
    {
        $this->validatorUpdate($request->all())->validate();
        try {
            DB::beginTransaction();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            }
            DB::table('model_has_roles')->where('model_id', $user->id)->delete();

            $user->assignRole($request->roles);

            // Profile
            $profile = Profile::where('user_id', $user->id)->first();
            if ($profile) {
                // Store image
                if ($request->hasFile('avatar')) {
                    $request->file('avatar')->storeAs(
                        'avatar',
                        $user->id . '_' . $request->file('avatar')->getClientOriginalName()
                    );
                    $avatar = Storage::path('avatar/' . $user->id . '_' . $request->file('avatar')->getClientOriginalName());
                } else {
                    $avatar = $request->gender == 0 ? asset('/img/undraw_profile.svg') : asset('/img/undraw_profile_3.svg');
                }
                $profile->update([
                    'gender' => $request->gender,
                    'avatar' => $request->avatar,
                    'birthday' => $request->birthday,
                    'avatar' => $avatar ? $avatar : $profile->avatar,
                    'fullname' => $request->fullname,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            }
            if ($profile) {
                DB::commit();
            }
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('message', 'Updated user successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AdminUser::find($id);
        if ($model) {
            DB::beginTransaction();
            $profile = Profile::where('user_id', $id)->first();
            if ($profile) {
                $model->delete();
                $profile->delete();
            }
            DB::commit();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    protected function validatorStore(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:admin_users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|integer',
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'avatar' => 'mimes:jpeg,jpg,png,bmp|dimensions:max_width=100,max_height=100,ratio=1|nullable',
            'birthday' => 'required|date|before:tomorrow',
            'address' => 'required|string'
        ]);
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'string|min:8|confirmed|nullable',
            'gender' => 'required|integer',
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'avatar' => 'mimes:jpeg,jpg,png,bmp|dimensions:max_width=100,max_height=100,ratio=1|nullable',
            'birthday' => 'required|date|before:tomorrow',
            'address' => 'required|string'
        ]);
    }
}
