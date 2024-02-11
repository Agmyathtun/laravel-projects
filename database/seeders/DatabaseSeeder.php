<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Article::factory(20)->create();
        Comment::factory(40)->create();
        Category::factory(5)->create();

        User::Factory()->create([
            "name"=>"alice",
            "email"=>"alice@gmail.com",
        ]);
        User::Factory()->create([
            "name"=>"bob",
            "email"=>"bob@gmail.com",
        ]);
    }
}
