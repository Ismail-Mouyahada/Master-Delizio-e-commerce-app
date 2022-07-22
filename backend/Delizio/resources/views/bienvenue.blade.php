@extends('layouts.main')
@section('title')
    Bienvenue
@endsection

@section('main')
    <!-- Carousel -->
    @if (session()->has('message'))
        <div class=" text-center px-4 py-4 text-warning bg-dark rounded">
            {{ session('message') }}
        </div>
    @endif
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="first-slide" src="images/recipe1-1920x600.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1><a href="recipe-detail.html">Recette de burger Classic avec des frittes</a></h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta
                            gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        <p><a class="btn btn-lg btn-primary" href="recipe-detail.html" role="button">En savoir plus</a>
                        </p>
                    </div>
                </div>
            </div>

            @foreach ($recettes as $Recette)
                <div class="sildeholder carousel-item">
                    <img class="second-slide" src="{{ $Recette->main_image }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1><a href="recipe-detail.html">{{ $Recette->title }}</a></h1>
                            <p>{{ $Recette->summary }}</p>
                            <p><a class="btn btn-lg btn-primary" href="{{ url('Recette/details/' . $Recette->id) }}"
                                    role="button">En savoir plus</a></p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
    <!-- Top Recipes -->
    <div class="top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Nombre de recettes</h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><i class=" text-warning fa fa-cutlery fa-2x"></i></a>
                        <h3><a href="recipe-detail.html">+{{ $Countrecettes }}</a></h3>
                        <p> Régaleries et recettes</p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Nombre d'utilisateurs</h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><i class=" text-warning fa fa-user fa-2x"></i></a>
                        <h3><a href="recipe-detail.html">+{{ $CountUsers }}</a></h3>
                        <p>Utilisateurs et cuisiniers </p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h5><i class="fa fa-cutlery" aria-hidden="true"></i> Nombre de Categories</h5>
                    <div class="box clearfix">
                        <a href="recipe-detail.html"><i class=" text-warning fa fa-list fa-2x"></i></a>
                        <h3><a href="recipe-detail.html">{{ $CountCategories }}</a></h3>
                        <p>Saveur et goûts variés</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- List Recipes -->
    <div class="list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center   mb-4 p-3 bg-light"><i class="fa fa-cutlery text-warning"
                            aria-hidden="true"></i>
                        Liste des
                        Reccettes</h4>

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

                            <p class="text-">{{ $recette->summary }}</p>
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
    <!-- Footer -->
@endsection
