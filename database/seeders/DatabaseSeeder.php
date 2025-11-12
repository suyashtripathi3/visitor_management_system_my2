<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         $this->call([
        DepartmentSeeder::class,
        BuildingSeeder::class,
        FloorSeeder::class,
        DesignationSeeder::class,
        VisitorSeeder::class,
        RolePermissionSeeder::class,
        UserSeeder::class, // If you created dummy user
    ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
