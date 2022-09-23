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
        $name = $this->faker->name();
        $type = ['public', 'privet'];
        return [
            'name'         => $name,
            'slug'         => Str::slug( $name ),
            'requirements' => $this->faker->sentence( rand( 5, 15 ) ),
            'audience'     => $this->faker->sentence(),
            'status'       => $type[rand( 0, 1 )],
            'category_id'  => Category::all()->random()->id,
            'teacher_id'   => User::all()->random()->id,
        ];
    }
}
