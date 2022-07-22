<?php

use App\Models\Note;
use App\Models\Step;
use App\Models\User;
use App\Models\Comment;
use App\Models\Recette;
use App\Models\Ustencil;
use App\Models\Categorie;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\services\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/api-auth', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    /*<------------------------ Retrieve All Recipe ------------------------>*/

    Route::get('/v1/recipes', function () {
        $all = Recette::all();

            $path = public_path();


        return response()->json($all);
    });

    /*<------------------------ Retrieve One Recipe ------------------------>*/

        Route::get('/v1/recipe/{id}', function ($id) {
        if (intval($id)) {
            $recipe = Recette::find($id);
            if ($recipe != null) {

                $ingredients =Ingredient::where('recette_id', $id)->get();
                $comments = Comment::where('recette_id', $id)->get();
                $rates = Note::where('recette_id', $id)->get();
                $Ustencils = Ustencil::where('recette_id', $id)->get();
                $Steps = Step::where('recette_id', $id)->get();
                $creator = User::where('id', $recipe->user_id)->get();

                return response()->json([
                    'data' => [
                        'recipe' => [$recipe],
                        'ingredients' => [$ingredients],
                        'comments' => [$comments],
                        'note' => [$rates],
                        'Ustencils' => [$Ustencils],
                        'Step' => [$Steps],
                        'creator' =>
                            $creator[0]->surname . ' ' . $creator[0]->name,
                    ],
                ]);
            } else {
                return response()->json([
                    'message' => 'cette recette n\'est pas disponible .',
                ]);
            }
        } else {
            return response()->json([
                'Alert' => 'Veuillez saisir un ID valide : /v1/recipe/{id}',
            ]);
        }
    });

    /*<------------------------ Delete Recipe ------------------------>*/

    Route::delete('/v1/recipe/delete/{id}', function ($id) {
        if (intval($id)) {
            $Recette = Recette::find($id);

            if ($Recette != null) {
                $message =
                    'the element with title " : ' .
                    $Recette->title .
                    '  " was deleted successfully !';
                $Recette->delete();
                return response()->json([
                    'reponse' => $message,
                ]);
            } else {
                return response()->json([
                    'reponse' => "Cet element n'existe pas ou déjà supprimé ! ",
                ]);
            }
        } else {
            return response()->json([
                'Alert' =>
                    'Veuillez saisir un ID valide : /v1/recipe/delete/{id}',
            ]);
        }
    });

    /*<------------------------ Create Recipe ------------------------>*/
    Route::post('/v1/recipe/create', function (Request $request) {
        $Recette = new Recette();
        $Recette->create($request->all());

        return response()->json([
            'response' =>
                'Awesome ! a new recipe record was created successfully.',
        ]);
    });

    /*<------------------------ Update recipe------------------------>*/
    Route::put('/v1/recipe/update/{id}', function (Request $request, $id) {
        if (intval($id)) {
            $Recette = Recette::findOrFail($id);
            $Recette->update([
                'main_image' => $request->main_image,
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

            return response()->json([
                'response' =>
                    'Done ! a new recipe record was updated successfully.',
            ]);
        } else {
            return response()->json([
                'Alert' =>
                    'Veuillez saisir un ID valide : /v1/recipe/update/{id}',
            ]);
        }
    });

    /*<------------------------ Retrieve Users ------------------------>*/
    Route::get('/v1/users', function () {
        $users = User::all();

        return response()->json($users);
    });

    /*<------------------------ Retrieve non user ------------------------>*/

    Route::get('/v1/user/{id}', function ($id) {
        if (intval($id)) {
            $user = User::findOrFail($id);
            $recipes = Recette::where('user_id', $id)->get();

            return response()->json([
                'data' => [
                    'userInfo' => $user,
                    'userRecipes' => [$recipes],
                ],
            ]);
        } else {
            return response()->json([
                'Alert' => 'Veuillez saisir un ID valide : /v1/user/{id}',
            ]);
        }
    });

    /*<------------------------ create user ------------------------>*/

    Route::post('/v1/user/create', function (Request $request) {
        $User = new user();
        $User->create([
            'name' => $request->name,
            'surname' => $request->surname,
            'username' => $request->username,
            'photo' => $request->photo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'Message' => 'un nouveau uilisateur a été créer avec succès.',
        ]);
    });

    /*<------------------------ create user ------------------------>*/

    Route::put('/v1/user/update/{id}', function (Request $request, $id) {
        if (intval($id)) {
            $User = User::findOrFail($id);
            $User->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'username' => $request->username,
                'photo' => $request->photo,
                'is_admin' => $request->is_admin,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'response' => 'Done ! a user record was updated successfully.',
            ]);
        } else {
            return response()->json([
                'Alert' =>
                    'Veuillez saisir un ID valide : /v1/user/update/{id}',
            ]);
        }
    });

    /*<------------------------ delete user ------------------------>*/
    Route::delete('/v1/user/delete/{id}', function ($id) {
        if (intval($id)) {
            $User = User::find($id);

            if ($User != null) {
                $message =
                    'the user with username " : ' .
                    $User->username .
                    '  " was deleted successfully !';
                $User->delete();
                return response()->json([
                    'reponse' => $message,
                ]);
            } else {
                return response()->json([
                    'reponse' => "Cet element n'existe pas ou déjà supprimé ! ",
                ]);
            }
        } else {
            return response()->json([
                'Alert' =>
                    'Veuillez saisir un ID valide : /v1/user/delete/{id}',
            ]);
        }
    });

    /*<------------------------ Retrieve categories ------------------------>*/

    Route::get('/v1/categories', function () {
        $categories = Categorie::all();

        return response()->json($categories);
    });

    /*<------------------------ Create category ------------------------>*/

    Route::post('/v1/category/create', function (Request $request) {
        $Categorie = new Categorie();
        $Categorie->create([
            'nom' => $request->nom,
        ]);

        $categoryName = $request->nom;

        return response()->json([
            'Message' => "un nouvelle catégorie '$categoryName' a été créer avec succès.",
        ]);
    });
});
