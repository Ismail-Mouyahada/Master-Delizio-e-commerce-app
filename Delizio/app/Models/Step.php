<?php

namespace App\Models;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Step extends Model
{
    use HasFactory;

    protected $fillable = ['step_title','step_details','recette_id'];
    public function recette()
        {
            return $this->belongsTo(Recette::class, 'recette_id');
        }
}