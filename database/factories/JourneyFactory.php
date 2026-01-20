<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Journey>
 */
class JourneyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->unique()->city(),
            "price" => fake()->numberBetween(40000, 2500000),
            "travel_time" => fake()->randomFloat(2,1.00, 40.00),
            "visa" => fake()->boolean(),
            "description" => fake()->sentences(3, true)
        ];
    }
}
