<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostForm>
 */
class PostFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText(150,2),
            'article_id' => $this->faker->numberBetween(1,20),
            'user_id' => $this->faker->numberBetween(1,20),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
