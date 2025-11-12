<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Visitor;
use Faker\Factory as Faker;

class VisitorSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 300; $i++) {
            Visitor::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->numerify('##########'),
                'company' => $faker->company(),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'purpose' => $faker->sentence(),
                'badge_no' => strtoupper($faker->bothify('BADGE-###??')),
                'photo' => null,
            ]);


        }
    }
}
