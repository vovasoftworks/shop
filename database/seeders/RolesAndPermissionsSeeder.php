<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);

        $permissionEdit = Permission::create(['name' => 'edit products']);
        $permissionDelete = Permission::create(['name' => 'edit products']);

        $role->givePermissionTo($permissionEdit);
    }
}
