<?php

namespace App\Models;



use App\Models\Note;
use App\Models\Comment;
use App\Models\Recette;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';
    protected $fillable = [
        'name',
        'surname',
        'username',
        'photo',
        'email',
        'password',
        'tokenable_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }
}