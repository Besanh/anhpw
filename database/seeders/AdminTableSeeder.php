<?php

namespace Database\Seeders;

use App\Models\Backend\AdminUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name' => 'Anh',
        //     'email' => 'anhle@gmail.com',
        //     'password' => Hash::make('12345678')
        // ]);
        $user = AdminUser::where('id', 1)->first();

        $role = Role::where('id', 1)->first();
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$user->id]);
    }
}
