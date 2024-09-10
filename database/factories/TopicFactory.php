<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topicTitle' => fake()->word(),
            'content' => fake()->paragraph(),
            'views' => fake()->numberBetween(0,500),
            'trending' => fake()->boolean(),
            'published' => fake()->boolean(),
            'image' => basename(fake()->image(public_path('assets/images/topics'))),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
