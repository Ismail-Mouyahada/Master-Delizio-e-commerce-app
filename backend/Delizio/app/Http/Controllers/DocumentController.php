<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Step;
use App\Models\User;
use App\Models\Recette;
use App\Models\Ingredient;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class DocumentController extends Controller
{
    public function showExport($id)
    {
        $recette = Recette::findOrfail($id);

        $user = User::findOrFail($recette->user_id);

        $ingredients = Ingredient::where('recette_id', $recette->id)->get();

        $fullname = $user->name . ' ' . $user->surname;
        return view(
            'documents.recipe',
            compact('recette', 'user', 'fullname', 'ingredients')
        );
    }

    public function exportPDF($id)
    {
        $recette = Recette::findOrfail($id);
        $user = User::findOrFail($recette->user_id);
        $ingredients = Ingredient::where('recette_id', $recette->id)->get();
        $fullname = $user->name . ' ' . $user->surname;
        $etapes= Step::where('recette_id', $recette->id)->get();
      

        $data = [
            'recette' => $recette,
            '$user' => $user,
            'ingredients' => $ingredients,
            'fullname' => $fullname,
            'etapes'=> $etapes
        ];

        $pdf = PDF::loadView('documents.recipe', $data);

        return $pdf->download($recette->title . date('Y-m-d') . '.pdf');
    }
}