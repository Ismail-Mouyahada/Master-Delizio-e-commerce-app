<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('main_image');
            $table->string('title');
            $table->integer('categorie');
            $table->text('summary');
            $table->string('tag');
            $table->text('description');
            $table
                ->integer('temps_cuisson')
                ->nullable()
                ->default(0);
            $table
                ->integer('temps_preparation')
                ->nullable()
                ->default(0);
            $table
                ->integer('temps_repos')
                ->nullable()
                ->default(0);
            $table
                ->integer('calories')
                ->nullable()
                ->default(0);
            $table
                ->integer('gras')
                ->nullable()
                ->default(0);
            $table
                ->integer('cholesterole')
                ->nullable()
                ->default(0);
            $table
                ->integer('carbohydrates')
                ->nullable()
                ->default(0);
            $table
                ->integer('proteines')
                ->nullable()
                ->default(0);
            $table
                ->integer('budget')
                ->nullable()
                ->default(0);
            $table
                ->integer('difficulte')
                ->nullable()
                ->default(0);
            $table->string('video');

            $table
                ->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->index('user_id');

            $table
                ->foreignId('ingredient_id')
                ->nullable()
                ->constrained('ingredients')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->index('ingredient_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recettes');
    }
}