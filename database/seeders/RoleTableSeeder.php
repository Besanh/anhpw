<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'super_admin',
            'admin',
            'cms',
            'content'
        ];
        foreach ($data as $node) {
            Role::create(['name' => $node, 'guard_name' => 'admin']);
        }
    }
}
