<?php

namespace Database\Factories;

use App\Models\Floor;
use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class FloorFactory extends Factory
{
    protected $model = Floor::class;

    public function definition()
    {
        return [
            'building_id' => Building::factory(), // Or passed in seeder
            'floor_name' => 'Floor ' . $this->faker->numberBetween(1, 10),
            'status' => true,
            // ✅ floor_id auto generated in Model boot()
        ];
    }
}
