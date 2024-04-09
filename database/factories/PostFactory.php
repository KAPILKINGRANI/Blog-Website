<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $images = collect(['1.jpg', '2.jpg', '3.jpg']);
        $isDraft = collect([0, 1])->random();

        if ($isDraft) {
            return [
                'user_id' => User::all()->shuffle()->first()->id,
                'category_id' => Category::all()->shuffle()->first()->id,
                'title' => fake()->sentence(mt_rand(5, 10)),
                'excerpt' => fake()->sentence(mt_rand(10, 20)),
                'body' => fake()->paragraphs(mt_rand(10, 20), true),
                'image_path' => 'images/posts/' . $images->random()
            ];
        }
        return [
            'user_id' => User::all()->shuffle()->first()->id,
            'category_id' => Category::all()->shuffle()->first()->id,
            'title' => fake()->sentence(mt_rand(5, 10)),
            'excerpt' => fake()->sentence(mt_rand(10, 20)),
            'body' => fake()->paragraphs(mt_rand(10, 20), true),
            'image_path' => 'images/posts/' . $images->random(),
            'published_at' => $isDraft ? NULL : now()
        ];
    }
}
