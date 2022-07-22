<?php

namespace App\Mail;

use App\Models\Step;
use App\Models\User;
use App\Models\Recette;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\emails\EmailController;

class RecettePartage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
     $this->details = $details;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $recette = $this->details  ;
        $user = User::find($recette->user_id);
        $ingredients = Ingredient::where('recette_id', $recette->id)->get();
        $fullname = $user->name . ' ' . $user->surname;
        $etapes = Step::where('recette_id', $recette->id)->get();

        return $this->subject('Delizio Recette : '.$this->details->title )
                    ->view('emails.recipe', compact('recette','user','ingredients','fullname','etapes'));
    }
}
