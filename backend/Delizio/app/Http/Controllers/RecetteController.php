<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Recette;
use App\Models\Categorie;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Charts\MonthlyUsersChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MonthlyUsersChart $chart)
    {
        $Recettes = Recette::all();
        $chart = $chart->build();

        return view('recipe.categories', compact('Recettes', 'chart'));
    }

    public function categorie()
    {
        $Ingredients = ingredient::all();
        $recettes = Recette::all();

        return view('recipe.categories', compact('recettes', 'Ingredients'));
    }

    public function topRecettes(Request $request)
    {
        $Ingredients = ingredient::all();
        $recettes = Recette::all();
        $TopRecipes  = DB::table('recettes')
            ->where('title', 'LIKE','%'.$request->data.'%')
            ->get();
// dd($TopRecipes);
        return view(
            'recipe.categories',
            compact('TopRecipes', 'recettes', 'Ingredients')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('recipe.create', compact('categories'));
    }

    protected function validator(Request $request)
    {
        return $request->validate([
            'main_image' => [
                'required',
                'mimes:png,jpg,svg,jpeg,webp,gif',
                'max:255',
                'unique:users',
            ],
            'title' => ['required', 'string', 'max:255'],
            'categorie' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'text'],
            'tag' => ['required', 'string', 'max:40'],
            'video' => ['required', 'string', 'max:255'],
            'ingredient' => ['required', 'text'],
            'quantite' => ['required', 'integer'],
            'unite' => ['required', 'text'],
            'description' => ['required', 'text'],
            'temps_repos' => ['required', 'integer'],
            'temps_preparation' => ['required', 'integer'],
            'temps_cuisson' => ['required', 'integer'],
            'calories' => ['required', 'integer'],
            'carbohydrates' => ['required', 'integer'],
            'gras' => ['required', 'integer'],
            'potreines' => ['required', 'integer'],
            'cholesterole' => ['required', 'integer'],
            'difficulte' => ['required', 'integer'],
            'budget' => ['required', 'integer'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lastRecord = Recette::all()->last()->id + 1;
        $Ingredient = new Ingredient();
        $Recette = new Recette();
        $step = new Step();
        $last = $lastRecord;
        $id = $last;





        $Recette->create([
            'main_image' => url('storage/'. $request->main_image->store('recettes', 'public')),
            'title' => $request->title,
            'categorie' => $request->categorie,
            'summary' => $request->summary,
            'tag' => $request->tag,
            'video' => $request->video,
            'description' => $request->description,
            'temps_repos' => $request->temps_repos,
            'temps_preparation' => $request->temps_preparation,
            'temps_cuisson' => $request->temps_cuisson,
            'calories' => $request->calories,
            'carbohydrates' => $request->carbohydrates,
            'gras' => $request->gras,
            'potreines' => $request->potreines,
            'cholesterole' => $request->cholesterole,
            'difficulte' => $request->difficulte,
            'budget' => $request->budget,
            'user_id' => Auth::user()->id,
            'ingredient_id' => $last,
        ]);

        for ($a = 0; $a < count( $request->quantite); $a++) {
            $Ingredient->create([
                'ingredient' => $request->ingredient[$a],
                'quantite' => $request->quantite[$a],
                'unite' => $request->unite[$a],
                'recette_id' => $last,
            ]);
        }

        for ($s = 0; $s < count($request->step_details); $s++) {
            $step->create([
                'step_title' => $request->step_title[$s],
                'step_details' => $request->step_details[$s],
                'recette_id' => $last,
            ]);
        }

        return redirect(route('recipe.show',$id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recette = Recette::findOrfail($id);
        $commentaires = Comment::where('recette_id', $id)->get();
        $user = User::findOrFail($recette->user_id);
        $ingredients = Ingredient::where('recette_id', $recette->id)->get();
        $etapes = Step::where('recette_id', $recette->id)->get();

        $fullname = $user->name . ' ' . $user->surname;

        return view(
            'recipe.show', compact('recette',
                'user',
                'fullname',
                'ingredients',
                'commentaires',
                'etapes'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::findOrFail($id);

        $ingredients = Ingredient::where('recette_id', $recette->id)->get();

        $categorie = Categorie::all();

        return view(
            'recipe.edit',
            compact('recette', 'categorie', 'ingredients')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recette = Recette::find($id);

        $recette->update([
            'main_image' => $request->main_image->store('recettes', 'public'),
            'title' => $request->title,
            'categorie' => $request->categorie,
            'summary' => $request->summary,
            'tag' => $request->tag,
            'video' => $request->video,
            'ingredient' => $request->ingredient,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'temps_repos' => $request->temps_repos,
            'temps_preparation' => $request->temps_preparation,
            'temps_cuisson' => $request->temps_cuisson,
            'calories' => $request->calories,
            'carbohydrates' => $request->carbohydrates,
            'gras' => $request->gras,
            'potreines' => $request->potreines,
            'cholesterole' => $request->cholesterole,
            'difficulte' => $request->difficulte,
            'budget' => $request->budget,
        ]);

        return redirect("/recette/details/$id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Recette = Recette::find($id);
        $Recette->delete();
        return redirect()
            ->route('pageAccueil')
            ->with('message', 'la recette a été supprimée avec succès 😥');
    }

    public function likeRecette($id)
    {
        $recette = Recette::find($id);
        $recette->like();
        $recette->save();

        return redirect()
            ->route('pageAccueil')
            ->with('message', 'Vous avez liké la recette!');
    }

    public function unlikeRecette($id)
    {
        $recette = Recette::find($id);
        $recette->unlike();
        $recette->save();

        return redirect()
            ->route('pageAccueil')
            ->with('message', 'Vous avez disliké la recette!');
    }
}
