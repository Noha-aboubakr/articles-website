<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
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
        return [ 'name' => fake()->name(),
                 'content' => fake()->paragraph(),
                 'published' => fake()->numberBetween(0, 1),
                 'image' => $this->generateRandomImage(public_path('adminassets/images')),

        ];
    }
}
