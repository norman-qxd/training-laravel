<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();//ignorar errores
        Category::truncate();
        Post::truncate();


        Post::factory(22)->create();
        Post::factory(2)->create([
            'user_id' => 1,
            'category_id' => 1,
        ]);

        Post::factory(2)->create([
            'user_id' => 3,
            'category_id' => 3,
        ]);

    }
}
