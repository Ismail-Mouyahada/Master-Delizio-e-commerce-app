<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'main_image' =>
                'https://foodish-api.herokuapp.com/images/dessert/dessert'.$this->faker->numberBetween(1, 30).'.jpg',
            'title' => $this->faker->sentence(),
            'categorie' => $this->faker->numberBetween(1, 20),
            'summary' => $this->faker->text(250),
            'tag' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'temps_cuisson' => $this->faker->numberBetween(0, 60),
            'temps_preparation' => $this->faker->numberBetween(0, 60),
            'calories' => $this->faker->numberBetween(0, 100),
            'gras' => $this->faker->numberBetween(0, 100),
            'proteines' => $this->faker->numberBetween(0, 100),
            'carbohydrates' => $this->faker->numberBetween(0, 100),
            'cholesterole' => $this->faker->numberBetween(0, 100),
            'budget' => $this->faker->numberBetween(0, 50),
            'difficulte' => $this->faker->numberBetween(1, 3),
            'video' =>
                'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
            'user_id' => $this->faker->numberBetween(1, 10),
            'ingredient_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
