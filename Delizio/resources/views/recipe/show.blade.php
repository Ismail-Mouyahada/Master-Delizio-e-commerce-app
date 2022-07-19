@extends('layouts.main')
@section('title')
    Details de la recettes
@endsection

@section('main')
    <!-- Detail Recipes-->
    <div class="recipe-detail">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">

                    <h4 class="bg-light text-gray-500 h2 p-3">{{ $recette->title }}</h4>
                    <h5 class=" text-warning"><i class="fa fa-user "></i> Chef : {{ $fullname }}</h5>
                    <h4> Publie le : {{ $recette->created_at }}</h4>
                </div>
                <div class="col-lg-10">


                    <!-- Button trigger modal -->
                    <button type="button" class=" text-white btn btn-warning w-100 p-3 fa fa-play my-2 text-small"
                        data-toggle="modal" data-target="#exampleModal">

                    </button>

                    <!-- Modal -->
                    <div class="modal w-100 fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="container-fluid d-flex justify-content-center align-items-center">

                                <div class="cotnainer-fluid">
                                    <video class="auto-mx" controls autoplay>
                                        <source src="{{ $recette->video }}" type="video/mp4">
                                        <source src="{{ $recette->video }}" type="video/ogg">
                                        <source src="{{ $recette->video }}" type="video/webm">
                                        <source src="{{ $recette->video }}" type="video/swf">
                                        <source src="{{ $recette->video }}" type="video/flv">

                                    </video>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- <img src="{{ Storage::url($recette->main_image) }}" alt=""> --}}


                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                {{-- <img class="d-block w-100" src="{{ Storage::url($recette->main_image) }}"
                                    alt="First slide"> --}}

                                <img class="d-block w-100" src="{{ $recette->main_image }}"
                                    alt="recette-{{ $recette->tag }}">

                            </div>

                            <div class="carousel-item">
                                {{-- <img class="d-block w-100" src="{{ Storage::url($recette->main_image) }}"
                                    alt="First slide"> --}}

                                <img class="d-block w-100" src="{{ $recette->main_image }}"
                                    alt="recette-{{ $recette->tag }}">
                            </div>
                            <div class="carousel-item">
                                {{-- <img class="d-block w-100" src="{{ Storage::url($recette->main_image) }}"
                                    alt="First slide"> --}}

                                <img class="d-block w-100" src="{{ $recette->main_image }}"
                                    alt="recette-{{ $recette->tag }}">
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>


                    <div class="info">
                        <div class="row">
                            <div class="col-lg-4 col-sm-4">
                                <p>Temps de repos:</p>
                                <p><strong><i class="fa fa-users" aria-hidden="true"></i>
                                        {{ $recette->temps_repos }}min</strong></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <p>Temps de préparation:</p>
                                <p><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $recette->temps_preparation }}min</strong></p>
                            </div>
                            <div class="col-lg-4 col-sm-4">
                                <p>Temps de cuisson:</p>
                                <p><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $recette->temps_cuisson }}min</strong></p>
                            </div>
                            <div class="col-lg-12 col-sm-12 text-center   my-4 shadow p-2">
                                <h3>Temps total:</h3>
                                <p><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                        {{ $recette->temps_cuisson + $recette->temps_preparation + $recette->temps_repos }}min</strong>
                                </p>
                            </div>
                        </div>
                    </div>


                    <p>{{ $recette->summary }}</p>

                    <div class="tag">
                        <a href="#">{{ $recette->tag }}</a>
                    </div>

                    <div class="ingredient-direction">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <h3>Ingredients</h3>
                                <ul class="ingredients">

                                    @foreach ($ingredients as $ingredient)
                                        <li>
                                            {{ $ingredient->quantite . ' x ' . $ingredient->ingredient . ' (' . $ingredient->unite . ')' }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <h3>Etapes</h3>
                                <ol class="directions">
                                    @foreach ($etapes as $etape)
                                        <li>{{ $etape->step_details }}</li>
                                    @endforeach

                                </ol>
                            </div>
                        </div>
                    </div>



                    <div class="nutrition-facts clearfix">
                        <h3>Valeur Nutritive</h3>
                        <div>
                            <p>Calories:</p>
                            <p><strong>{{ $recette->calories }} kcal</strong></p>
                        </div>
                        <div>
                            <p>Carbohydrate:</p>
                            <p><strong>{{ $recette->carbohydrates }} g</strong></p>
                        </div>
                        <div>
                            <p>Matière Gras:</p>
                            <p><strong>{{ $recette->gras }} g</strong></p>
                        </div>
                        <div>
                            <p>Proteines:</p>
                            <p><strong>{{ $recette->proteines }} g</strong></p>
                        </div>
                        <div>
                            <p>Cholésterole:</p>
                            <p><strong>{{ $recette->cholesterole }} mg</strong></p>
                        </div>

                    </div>


                    <div class="nutrition-facts clearfix d-flex justify-content-center align-items-center">
                        <h3> <i class="fa fa-dollar"></i> Accessibilité</h3>
                        <div class="text-center mx-3">
                            <p class="text-small card text-center p-2">Budget:</p>
                            <p class="my-3 card p-2"><strong class="text-warning">
                                    @if (intval($recette->budget) <= 5)
                                        Pas cher
                                    @elseif (intval($recette->budget) <= 10)
                                        Bon marché
                                    @elseif (intval($recette->budget) <= 20)
                                        Générieuse
                                    @else
                                        Préstigeuse
                                    @endif



                                </strong></p>
                        </div>
                        <div class="text-center mx-3">
                            <p class="text-small card text-center p-2">Difficulté:</p>
                            <p class="my-3 card p-2"><strong class="text-warning">
                                    @if ($recette->difficulte == '1')
                                        facile
                                    @elseif ($recette->difficulte == '2')
                                        moyenne
                                    @elseif ($recette->difficulte == '3')
                                        difficile
                                    @else
                                        n'est pas resigné
                                    @endif

                                </strong></p>
                        </div>
                    </div>


                    <div class="nutrition-facts clearfix d-flex justify-content-center align-items-center bg-light p-4">

                        <div class="w-50 m-2">

                            <a class="btn btn-warning text-white "
                                href="{{ Route('documents.recipe', $recette->id) }}"><i class="fa fa-download"></i>
                                Télécharger</a>
                        </div>
                        <div class="w-50 m-2">



                            <form action="{{ '/send/mail/' . $recette->id }}">

                                @csrf
                                @method('get')

                                <input type="email" name="email" value="" class="form-control"
                                    placeholder="E-mail de destinataire">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror



                                <button type="submit" class="btn btn-warning text-white m-2"><i class="fa fa-send"></i>
                                    Envoyez par mail</button>

                            </form>








                        </div>
                    </div>



                    <div class="blog-comment">
                        <h3>({{ count($commentaires) }}) Commentaire</h3>
                        <hr />
                        <ul class="comments">

                            @foreach ($commentaires as $comment)
                                <li>
                                    <div class="post-comments">
                                        <p class="meta">{{ $comment->created_at }}
                                            @if ($comment->user_id)
                                                <a href="#">{{ $comment->user->name }}
                                                </a>
                                            @else
                                                <a href="#">{{ __('Annonyme') }}
                                                </a>
                                            @endif




                                            a dit :
                                        <p>
                                            {{ $comment->commentaire }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>


                        @auth



                            <div class="reply">
                                <h3>Laissez un commentaire</h3>
                                <form action="{{ route('comment.store', $recette->id) }}" method="post">
                                    @csrf
                                    <p class="comment-form-comment">
                                        <textarea class="form-control" id="comment" name="commentaire" cols="45" rows="5"
                                            aria-required="true" placeholder="laisser un commentaire ..."></textarea>
                                    </p>

                                    <p class="form-submit">
                                        <input class="btn btn-submit btn-block" name="submit" type="submit" id="submit"
                                            value="soumettre">
                                    </p>
                                </form>
                            </div>

                        @endauth

                    </div>


                </div>
            </div>
        </div>
    @endSection
