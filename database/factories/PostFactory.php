<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'images/placeholders/banner.png',
            'images/placeholders/banner-alt.png',
        ];
        $title = fake()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title, "-"),
            'description' => fake()->sentence(4),
            'content' => fake()->text(),
            'image' => $images[rand(0,1)],
            'user_id' => User::all()->random()->id,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ];
    }
}
