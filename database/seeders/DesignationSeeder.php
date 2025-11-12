<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    public function run(): void
    {
        $designations = [
            'Professor',
            'Associate Professor',
            'Assistant Professor',
            'HOD',
            'Dean',
            'Clerk',
            'Principal',
        ];

        foreach ($designations as $desig) {
            Designation::create([
                'name' => $desig,
                'status' => 'active'
            ]);
        }
    }
}
