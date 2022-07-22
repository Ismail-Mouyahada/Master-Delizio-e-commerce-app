<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'step_title'=>$this->faker->title,
            'step_details'=>$this->faker->text(230),
            'recette_id'=>$this->faker->numberBetween(1, 10)
        ];
    }
}