<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $name = fake()->sentence(rand(2, 5));
        $type = ['active', 'inactive'];
        return [
            'name'         => $name,
            'slug'         => Str::slug( $name ),
            'description'  => fake()->paragraphs( rand( 1, 3), true ),
            'requirements'  => fake()->paragraphs( rand( 1, 3), true ),
            'audience'      => fake()->paragraphs( rand( 1, 3), true ),
            'visibility'   => $type[rand( 0, 1 )],
            'category_id'  => Category::all()->random()->id,
            'teacher_id'   => 1,
            'thumbnail'    => 'https://source.unsplash.com/random/300x300?bool,library&'.rand(2,2423),
        ];
    }
}
