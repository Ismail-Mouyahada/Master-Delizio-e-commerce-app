<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'email' => $this->faker->email(),
            'sujet' => $this->faker->word(3),
            'details' => $this->faker->text(),
        ];
    }
}