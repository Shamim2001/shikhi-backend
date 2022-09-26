<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Shamim Ahmed',
            'username' => 'shamim',
            'email' => 'admin@shikhi.test',
            'password' => bcrypt('123'),
        ]);

        // Category
        Category::factory(10)->create();

        // Course
        Course::factory(15)->create();
        // Lesson
        Lesson::factory(10)->create();
    }
}
