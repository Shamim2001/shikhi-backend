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
        $type = ['public', 'private'];
        return [
            'name'         => $name,
            'slug'         => Str::slug( $name ),
            'description'  => $this->faker->sentence( rand( 5, 10 ) ),
            'requirements' => $this->faker->sentence( rand( 5, 10 ) ),
            'audience'     => $this->faker->name(),
            'visibility'       => $type[rand( 0, 1 )],
            'category_id'  => Category::all()->random()->id,
            'teacher_id'   => User::all()->random()->id,
            'thumbnail'    => 'https://i.pravatar.cc/300?img=2',
        ];
    }
}
