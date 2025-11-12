<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BuildingFactory extends Factory
{
    public function definition()
    {
        return [
            'name'    => $this->faker->company . ' Building',
            'address' => $this->faker->address,
            'status'  => 1,
        ];
    }
}
