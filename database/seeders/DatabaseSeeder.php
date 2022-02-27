<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::create([
            'name' => 'Programing',
            'slug' => 'programing'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        //user seeding manual
        User::create([
            'name' => 'Ridho Tri Kurniasandi',
            'email' => 'ridhotks@gmail.com',
            'password' => bcrypt(12345),
        ]);

        Post::factory(10)->create();
    }
}
