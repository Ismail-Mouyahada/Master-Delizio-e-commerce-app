@extends('layouts.main')


@section('title')
    Catégories
@endSection

@section('main')


    <div class="search">
        <div class="container">
            <div class="row">
                <form action="{{ route('filtrer') }}" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="col-lg-12">
                        <h2>Filtrer les recettes</h2>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Selectionner une catégorie</label>
                                    <select nom="categorie" class="js-search-category form-control select2-hidden-accessible"
                                        name="categorie" data-placeholder="choisissez une categories" tabindex="-1"
                                        aria-hidden="true">
                                        <option value="1">Tous</option>
                                        <option value="2">Petit-déjeuner</option>
                                        <option value="3">Déjeunner</option>
                                        <option value="4">Boisson</option>
                                        <option value="5">Entrées</option>
                                        <option value="6">Soupes</option>
                                        <option value="7">Saldes</option>
                                        <option value="8">Viande</option>
                                        <option value="9">Poulet</option>
                                        <option value="10">Jombon</option>
                                        <option value="11">Fruits de mer</option>
                                        <option value="12">Vegetarien</option>
                                        <option value="13">Légumes</option>
                                        <option value="14">Desserts</option>
                                        <option value="15">Glasses</option>
                                        <option value="16">Pains</option>
                                        <option value="17">Repas des vacances</option>
                                    </select>

                                    <span class="select2 select2-container select2-container--default" dir="ltr"
                                        style="width: 255px;">
                                        <span class="selection">

                                            <span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Selectionner un ou plusieurs ingrédients </label>
                                    <select nom="ingredients[]"
                                        class="js-search-ingredients form-control select2-hidden-accessible"
                                        name="ingredients[]" multiple="" data-placeholder="Ingrédients dans la rcette"
                                        tabindex="-1" aria-hidden="true">
                                        @foreach ($Ingredients as $ingred)
                                            <option value="{{ $ingred->ingredient }}">{{ $ingred->ingredient }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>la recette devrait avoir</label>
                                    <select nom="ingredientFilter"
                                        class="js-search-category2 form-control select2-hidden-accessible" name="category"
                                        data-placeholder="Choose Category" tabindex="-1" aria-hidden="true">
                                        <option value="1">Tous les ingrédients selectionnées </option>
                                        <option value="2">Un ou plusieurs ingrédients selectionnées</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-lg-12">


                                <div class="form-group">
                                    <input type="text" name="data" class="form-control"
                                        placeholder="Saisissez le nom la rcette ici">
                                    <button type="search" class="btn">Chercher des recettes</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="list">
        <div class="container">

            @if (isset($TopRecipes))
                <div class="row">
                    <div class="col-lg-12">
                        <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Résultat de la recherche</h5>
                    </div>

                    @foreach ($TopRecipes as $TopRecipe)
                        <div class="col-lg-4 col-sm-6">
                            <div class="box grid recipes">
                                {{-- <div class="by"><i class="fa fa-user" aria-hidden="true"></i>{{ $TopRecipe->user_id }}
                                </div> --}}
                                {{-- <a href="#"><img src="{{ Storage::url($TopRecipe->main_image) }}"
                                        alt="hey"></a> --}}
                                <a href="#">
                                    < <img src="{{ $TopRecipe->main_image }}" alt="recette-{{ $recette->tag }}">
                                </a>

                                <h2><a href="#">{{ $TopRecipe->title }}</a></h2>
                                <p>{{ $TopRecipe->summary }}</p>
                                <div class="tag">
                                    <a href="#">{{ $TopRecipe->tag }}</a>
                                </div>

                                <div class='bg-light  py-2 d-flex justify-content-around'>
                                    <a href="{{ url('recette/details/' . $TopRecipe->id) }}">
                                        <span
                                            class="fa fa-eye text-white border-circle  rounded-4 bg-warning p-2 fa fa-eye">
                                        </span>
                                    </a>

                                    @auth
                                        <form action="{{ url('recette/supprimer/' . $TopRecipe->id) }}" method="get">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger text-white border-cirlce ">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{ url('recette/modifier/' . $TopRecipe->id) }}"> <span
                                                class="fa fa-edit text-white border-circle  rounded-4 bg-warning p-2">
                                            </span> </a>
                                    @endauth


                                </div>
                            </div>



                        </div>
                    @endforeach

                    <div class="col-lg-12 text-center">
                        <a href="#" class="btn btn-load">Voir plus de top recettes</a>
                    </div>
                @else
                    <div class="col-lg-12 text-center">
                        <a href="#" class="btn btn-load">Désolé mais il y a aucune recette avec ce nom</a>
                    </div>
            @endif

        </div>

        <div class="row">
            <div class="col-lg-12">
                <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Liste des Reccettes</h5>

            </div>
            @foreach ($recettes as $recette)
                <div class="col-lg-3 col-sm-3 recette-card">
                    <div class="box grid recipes">
                        <div class="by"><i class="fa fa-user" aria-hidden="true"></i>
                            {{ $recette->user->surname }}
                        </div>

                        <a href="{{ url('recette/details/' . $recette->id) }}">
                            <img class="image-medium" src="{{ $recette->main_image }}"
                                alt="recette-{{ $recette->tag }}">
                            {{-- <img class="image-medium" src="{{ Storage::url($recette->main_image) }}"
                                    alt="recette-{{ $recette->tag }}"> --}}
                        </a>

                        <h2>
                            <a href="{{ url('recette/details/' . $recette->id) }}">{{ $recette->title }}</a>
                        </h2>

                        <p>{{ $recette->summary }}</p>
                        <div class="tag">
                            <a href="#">{{ $recette->tag }}</a>
                        </div>

                        <div class='bg-light  py-2 d-flex justify-content-around'>

                            <form action="{{ route('unlike.recette', $recette->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger text-white  ">
                                    <i class="fa fa-thumbs-down"></i>
                                </button>
                            </form>

                            <span class="fa fa-heart text-danger p-2"><strong>{{ $recette->likeCount }}</strong>
                            </span>
                            <form action="{{ route('like.recette', $recette->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning text-white bg-warning">
                                    <i class="fa fa-thumbs-up"></i>
                                </button>
                            </form>

                        </div>

                        <div class='bg-muted  py-2 d-flex justify-content-around'>
                            <a href="{{ url('recette/details/' . $recette->id) }}">
                                <span class="fa fa-eye text-white border-circle  rounded-4 bg-warning p-2 fa fa-eye">
                                </span>
                            </a>

                            @auth
                                @if (Auth::user()->id == $recette->user_id)
                                    <form action="{{ url('recette/supprimer/' . $recette->id) }}" method="get">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger text-white border-cirlce ">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{ url('recette/modifier/' . $recette->id) }}"> <span
                                            class="fa fa-edit text-white border-circle  rounded-4 bg-warning p-2">
                                        </span> </a>
                                @endif
                            @endauth


                        </div>

                    </div>

                </div>
            @endforeach
            <div class="col-lg-12 text-center">
                <a href="{{ route('categorie.index') }}" class="btn btn-load">Voir plus de recettes</a>
            </div>

        </div>
    </div>
    </div>
@endSection
