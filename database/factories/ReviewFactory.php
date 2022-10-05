<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'star'         => fake()->numerify(rand(1, 5)),
            'content'      => fake()->paragraphs( rand( 1, 3), true ),
            'student_id'   => 1,
            'course_id'    => Course::all()->random()->id,
        ];
    }
}
