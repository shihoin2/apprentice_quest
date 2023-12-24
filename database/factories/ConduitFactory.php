<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conduit>
 */
class ConduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(50,2),
            'about' => $this->faker->realText(250,2),
            'detail' => $this->faker->realText(900,2),
            'tag' => $this->faker->text(10),
            'user_id' => $this->faker->numberBetween(1,20),
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
