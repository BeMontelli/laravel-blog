<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'placeholders/pic-1.png',
            'placeholders/pic-2.jpg',
            'placeholders/pic-3.png',
        ];

        return [
            'title' => fake()->word(rand(2, 3),true),
            'description' => fake()->sentence(4),
            'image' => $images[rand(0,2)],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}
