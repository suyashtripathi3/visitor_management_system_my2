<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Fetch first department & designation dynamically
        $department = Department::first();
        $designation = Designation::first();

        // ✅ Create Super Admin User (Fixed)
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'department_id' => $department?->id,
                'designation_id' => $designation?->id,
                'status' => 'active'
            ]
        );

        // ✅ Assign Super Admin Role
        $superAdmin->assignRole('Super Admin');

        // ✅ Create test users dynamically
        $roles = ['Admin', 'Faculty', 'Student'];

        foreach ($roles as $role) {

            $user = User::updateOrCreate(
                ['email' => strtolower($role).'@example.com'],
                [
                    'name' => $role.' User',
                    'password' => Hash::make('password'),
                    'department_id' => Department::inRandomOrder()->value('id'),
                    'designation_id' => Designation::inRandomOrder()->value('id'),
                    'status' => 'active'
                ]
            );

            $user->assignRole($role);
        }
    }
}
