<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $unites = ['kg', 'L', 'Pièce', 'g', 'ml', 'cm'];

        return [
            'ingredient' => $this->faker->name(),
            'quantite' => $this->faker->numberBetween(0, 10),
            'unite' => $unites[$this->faker->numberBetween(0, 5)],
            'recette_id' => $this->faker->numberBetween(0, 10),
        ];
    }
}
