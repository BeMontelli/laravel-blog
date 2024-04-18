<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'images/placeholders/pic-1.png',
            'images/placeholders/pic-2.jpg',
            'images/placeholders/pic-3.png',
        ];
        $title = fake()->word(rand(2, 3),true);

        return [
            'title' => $title,
            'slug' => Str::slug($title, "-"),
            'description' => fake()->sentence(4),
            'image' => $images[rand(0,2)],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}
