<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'answer_a' => $this->faker->word,
            'answer_b' => $this->faker->word,
            'answer_c' => $this->faker->word,
            'answer_d' => $this->faker->word,
            'correct_answer' => 'b',
        ];
    }
}
