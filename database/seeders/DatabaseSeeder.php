<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::truncate();
        Blog::truncate();
        Category::truncate();
        $frontend = Category::factory()->create([
            'name' => "Frontend",
            'slug' => "fronted"
        ]);
        $backend = Category::factory()->create([
            'name' => "Backend",
            'slug' => "backend"
        ]);
        $mgmg = User::factory()->create([
            'name' => 'mgmg',
            'username' => 'mgmg'
        ]);
        $kyawkyaw = User::factory()->create([
            'name' => 'kyawkyaw',
            'username' => 'kyawkyaw'
        ]);
        Blog::factory(2)->create([
            'category_id' => $frontend->id,
            'user_id' => $mgmg->id
        ]);
        Blog::factory(2)->create([
            'category_id' => $backend->id,
            'user_id' => $kyawkyaw->id
        ]);
    }
}
