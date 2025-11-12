<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            'Computer Science',
            'Management',
            'Humanities',
            'Physics',
            'Chemistry',
            'Mathematics',
            'Biotechnology',
        ];

        foreach ($departments as $dept) {
            Department::create([
                'name' => $dept,
                'status' => 'active'
            ]);
        }
    }
}
