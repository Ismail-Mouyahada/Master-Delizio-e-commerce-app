<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UstencilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'quantite' => $this->faker->numberBetween(0, 10),
        ];
    }
}