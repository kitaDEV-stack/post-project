<?php

namespace Database\Factories;

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
        return [
            'user_id' => rand(1,5),
            'catagory_id' => rand(1,5),
            'title' => fake()->sentence(10),
            'description' => fake()->sentence(30),
            'is_feature' => rand(1,0)
        ];
    }
}
