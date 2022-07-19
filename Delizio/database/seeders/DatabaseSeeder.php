<?php

namespace Database\Seeders;
use App\Models\Note;
use App\Models\Step;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Recette;
use App\Models\Ustencil;
use App\Models\Categorie;
use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Categorie::factory(10)->create();
        User::factory(10)->create();
        Ingredient::factory(10)->create();
        Message::factory(10)->create();
        // Comment::factory(10)->create(); //seed this line in a seconde injection 'cause it's dependant from recette_id '
        Note::factory(10)->create();
        Recette::factory(10)->create();
        Image::factory(10)->create();
        Ustencil::factory(10)->create();
        Step::factory(10)->create();
    }
}