<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
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
            'name' => fake()->streetName(),
            'icon' => 'icons/' . fake()->imageUrl(),
            'thumbnail' => 'thumbnails/' . fake()->imageUrl(),
            "description" => fake()->sentence(),
            'location' => fake()->streetAddress(),
            'type' => fake()->randomElement(['public', 'private']),
            'members' => fake()->numberBetween(0, 2000),
        ];
    }
}
