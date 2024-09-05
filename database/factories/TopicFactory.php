<?php

namespace Database\Factories;

use App\Traits\Common;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    private function generateRandomImage($path)
    {
        $files = array_diff(scandir($path), ['.', '..']);

        return $this->faker->randomElement($files);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 'topictitle' => fake()->word(),
                 'content' => fake()->paragraph(),
                 'published' => fake()->numberBetween(0, 1),
                 'trending' => fake()->numberBetween(0, 1),
                 'image' => $this->generateRandomImage(public_path('adminassets/images/topics')),
                 'views'=> fake()->numberBetween(1,100),
                 'category_id'=> fake()->numberBetween(1,10),

        ];
    }
}
