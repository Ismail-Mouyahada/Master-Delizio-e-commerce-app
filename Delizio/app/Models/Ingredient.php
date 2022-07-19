<?php

namespace App\Models;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['ingredient', 'quantite', 'unite', 'recette_id'];

    /**
     * Get the user that owns the Ingredient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Recette()
    {
        return $this->belongsTo(Recette::class, 'recette_id');
    }
}
