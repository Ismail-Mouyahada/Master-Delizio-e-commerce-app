<?php

namespace App\Http\Controllers\services;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @OA\Get(
     *      path="/v1/api-auth",
     *      operationId="login",
     *      tags={"Tests"},

     *      summary="Sign up to get an access token",
     *      description="Returns an access token to get a ",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     * @OA\Response(
     *      response=404,
     *      description="not found"
     *   ),
     *  )
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        if (
            !Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])
        ) {
            return response()->json([
                'Information' =>
                    'Pour utiliser Delizi API , Il faudra générer un jeton personnel d\'accès.',
                'Erreur' => 'les données sont incorrectes',
                'requête' => 200,
                'message' =>
                    'les données que vous avez rensigné ne correspondent pas à aucune de nos resultats.',
            ]);
        } else {
            $user = Auth()->user();
            $token = $user->createToken('token');

            return response()->json([
                'API REST DELIZIO :Bravo !  Voici votre Token Berear ' =>
                    $token->plainTextToken,
            ]);
        }
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
