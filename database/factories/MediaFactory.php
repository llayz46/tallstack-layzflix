<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_id' => $this->faker->randomNumber(),
            'media_type' => $this->faker->randomElement(['tv', 'movie']),
            'normalized_title' => $this->faker->sentence(),
            'overview' => $this->faker->sentences(3, true),
            'poster_path' => $this->faker->imageUrl(),
            'release_date' => $this->faker->date(),
        ];
    }
}
