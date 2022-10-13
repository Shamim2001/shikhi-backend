<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create( ['name' => 'SuperAdmin'] );
        Role::create( ['name' => 'student'] );
        Role::create( ['name' => 'teacher'] );

        User::factory()->create([
            'name' => 'Shamim Ahmed',
            'username' => 'shamim',
            'email' => 'admin@shikhi.test',
            'password' => bcrypt('123'),
            'thumbnail' => 'https://i.pravatar.cc/300?img=2',
        ])->assignRole('SuperAdmin');

        // Category
        Category::factory(10)->create();
        // Course
        Course::factory(15)->create();
        Tag::factory(10)->create();
        // Lesson
        Lesson::factory(10)->create();
    }
}
