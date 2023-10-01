<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'uuid'=>Str::uuid(),
            'user_id'=>rand(1,User::pluck('id')->random()),
            'name'=>fake()->streetName(),
            'icon'=>'icons/'.fake()->imageUrl(),
            'thumbnail'=> 'thumbnails/'.fake()->imageUrl(),
            "description"=>fake()->sentence(),
            'location'=>fake()->streetAddress(),
            'type'=>fake()->randomElement(['public','private']),
            'members'=>fake()->numberBetween(0,50),

        ]);
    }
}