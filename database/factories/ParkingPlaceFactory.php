<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingPlace>
 */
class ParkingPlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalSpots = fake()->numberBetween(3, 50);

        return [
            'name' => $this->faker->streetName(),
            'info' => $this->faker->sentence(),
            'taken_spots' => fake()->numberBetween(0, $totalSpots),
            'total_spots' => $totalSpots,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
