<?php

namespace App\Models;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ustencil extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'quantite','recette_id'];



        /**
         * Get the user that owns the Ustencil
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function recette()
        {
            return $this->belongsTo(Recette::class ,'recette_id');
        }


}