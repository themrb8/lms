<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course_id' => 1,
            'name' => $this->faker->sentence,
            'week_day' => 'friday',
            'end_date' => $this->faker->date,
            'class_time' => $this->faker->time,
        ];
    }
}
