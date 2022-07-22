<?php

namespace App\Models;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['note','recette_id'];

    /**
     * Get the user associated with the Note
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the user associated with the Note
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function recette()
    {
        return $this->belongsTo(Recette::class);
    }
}