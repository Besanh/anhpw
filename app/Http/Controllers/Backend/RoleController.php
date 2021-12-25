<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\AdminMenuRole;
use App\Models\Backend\AdminUser;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list', ['only' => ['index']]);
        $this->middleware('permission:role-show', ['only' => ['show']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $menus = Menu::buildDataForList(Menu::buildTree(1));

        return view('admin.role.create', compact('permissions', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role->create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions($request->permission);

        // Luu cac menu vao bang
        if ($request->menu) {
            AdminMenuRole::create(['menu' => serialize($request->menu), 'role_id' => $role->id]);
        }

        // Clear cache
        Cache::flush();

        return redirect()->back()->with('message', 'Created role successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
            ->where('role_has_permissions.role_id', $role->id)
            ->get();
        $menus = Cache::remember('menu_role', timeToLive(), function () {
            return Menu::buildDataForList(Menu::buildTree(1));
        });
        $menu_role = AdminMenuRole::where('role_id', $role->id)
            ->select(['id', 'menu'])
            ->first();

        return view('admin.role.show', compact('role', 'rolePermissions', 'menus', 'menu_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        $menus = Cache::remember('menu_role', timeToLive(), function () {
            return Menu::buildDataForList(Menu::buildTree(1));
        });
        $menu_role = AdminMenuRole::where('role_id', $role->id)
            ->select(['id', 'menu'])
            ->first();

        return view('admin.role.edit', compact('role', 'permissions', 'rolePermissions', 'menus', 'menu_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $role->update([
            'name' => $request->name,
            'guard' => 'admin'
        ]);

        $role->syncPermissions($request->permission);

        /**
         * Lay menu trong admin_menu_roles
         * Neu co thi update
         * Khong co thi insert
         */
        if ($request->menu) {
            $menu_role = AdminMenuRole::where('role_id', $role->id)->first();
            if ($menu_role) {
                $menu_role->update(['menu' => serialize($request->menu)]);
            } else {
                AdminMenuRole::create(['menu' => serialize($request->menu), 'role_id' => $role->id]);
            }
        }

        // Clear cache
        Cache::flush();

        return redirect()->back()->with('message', 'Updated role successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Role::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }
}
