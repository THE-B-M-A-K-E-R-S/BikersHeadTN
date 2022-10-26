<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'color' => fake()->colorName(),
            'brand' => fake()->company(),

            'model' => fake()->word(),
            'bike_type_id' => fake()->biasedNumberBetween($min = 1, $max = 3),
            'size' => fake()->word(),
            'price' => fake()->randomNumber(3),
            'description' => fake()->text($maxNbChars = 10),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
