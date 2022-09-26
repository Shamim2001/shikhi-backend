<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\lesson>
 */
class LessonFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $name = $this->faker->name();
        $type = ['public', 'private'];
        return [
            'name'         => $name,
            'slug'         => Str::slug( $name ),
            'content'      => $this->faker->sentence( rand( 5, 10 ) ),
            'visibility'   => $type[rand( 0, 1 )],
            'course_id'    => Course::all()->random()->id,
        ];
    }
}
