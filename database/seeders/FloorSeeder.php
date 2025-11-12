<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Floor;
use App\Models\Building;

class FloorSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure at least one building exists
        $building = Building::first();

        if (!$building) {
            $building = Building::create([
                'building_name' => 'Main Building',
                'status' => true
            ]);
        }

        // Create 5 sample floors
        Floor::factory()
            ->count(5)
            ->create([
                'building_id' => $building->id,
            ]);
    }
}
