<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_image'=> 'https://foodish-api.herokuapp.com/images/dessert/dessert'.$this->faker->numberBetween(0, 33).'.jpg',
            'recette_id'=> $this->faker->numberBetween(1, 10),
        ];
    }
}
