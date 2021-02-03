<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Article::factory(10)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Comment::factory(10)->create();

        \App\Models\User::factory()->create([
            "name" => "thurain",
            "email" => "thurain@email"
        ]);

        \App\Models\User::factory()->create([
            "name" => "bob",
            "email" => "bob@email"
        ]);
    }
}
