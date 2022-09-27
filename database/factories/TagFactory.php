<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tag>
 */
class TagFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $name = $this->faker->words( 1, true );
        return [
            'name'      => $name,
            'slug'      => Str::slug( $name ),
            'course_id' => Course::all()->random()->id,
        ];
    }
}
