<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions
        $permissions = [
            'view users',
            'create users',
            'edit users',
            'delete users',

            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'assign permissions',

            'view department',
            'create department',
            'edit department',
            'delete department',

            'view designation',
            'create designation',
            'edit designation',
            'delete designation',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $roles = [
            'Super Admin',
            'Admin',
            'Faculty',
            'Student'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Assign all permissions to Super Admin
        $superAdmin = Role::where('name', 'Super Admin')->first();
        $superAdmin?->syncPermissions(Permission::all());
    }
}
