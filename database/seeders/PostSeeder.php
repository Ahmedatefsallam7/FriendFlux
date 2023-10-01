<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'uuid' => Str::uuid(),
            'user_id' => rand(1,User::pluck('id')->random()),
            'content' => fake()->sentence,
            'status'=>fake()->randomElement(['published', 'private']),
            'total_Likes'=>fake()->numberBetween(1,5000),
            'total_Comments'=>fake()->numberBetween(1,5000),
            'is_page_post'=>0,
            'page_id'=>null,
            'is_group_post'=>fake()->randomElement([0, 1]),
            'group_id'=>rand(1,Group::pluck('id')->random()),
        ]);
    }
}