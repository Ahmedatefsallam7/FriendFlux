<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'uuid' => Str::uuid(),
            'user_id' => rand(1, User::pluck('id')->random()),
            'content' => fake()->sentence,
            'status' => fake()->randomElement(['published', 'private']),
            'total_Likes' => fake()->numberBetween(1, 5000),
            'total_Comments' => fake()->numberBetween(1, 5000),
            'is_page_post' => 0,
            'page_id' => null,
            'is_group_post' => fake()->randomElement([0, 1]),
            'group_id' => Post::where('is_group_post', 0)->first() ? null : rand(1, Group::pluck('id')->random()),
        ];
    }
}
