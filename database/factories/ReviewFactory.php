<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
        'review' => fake()->paragraph(),
        'created_at' => fake()->unixTime(),
        'updated_at' => fake()->unixTime(),
        'base_score' => fake()->randomDigit(),
        'final_score' => fake()->randomDigit(),
        'version' => fake()->semver()
      ];
    }
}
