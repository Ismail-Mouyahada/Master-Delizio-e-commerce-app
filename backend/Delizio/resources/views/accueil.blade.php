@extends('layouts.main')
@section('title')
    Espace utilisateur
@endsection

@section('main')
    <div class="container-fluid   py-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">

                        <h5 class="text-center text-warning"> {{ __('Tableau de bord') }} </h5>
                        <p class="text-center text-white"> {!! __('Bienvenue <strong>' . Auth::User()->name . '</strong> !') !!} </p>

                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>

                    <ul class="nav nav-pills m-4 bg-dark p-2 " role="tablist">
                        <li class="nav-item bg-warning">
                            <a class="  nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><i
                                    class="fa fa-cutlery" aria-hidden="true"></i> Mes
                                recettes</a>
                        </li>
                        <li class="nav-item bg-warning">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> <i class="fa fa-envlope"
                                    aria-hidden="true"></i>Messagerie</a>
                        </li>

                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-12">


                                    </div>
                                    @foreach ($recettes as $recette)
                                        <div class="col-lg-3 col-sm-3 recette-card">
                                            <div class="box grid recipes">
                                                <div class="by"><i class="fa fa-user" aria-hidden="true"></i>
                                                    {{ $recette->user->surname }} </div>

                                                <a href="{{ url('recette/details/' . $recette->id) }}">
                                                    <img class="image-medium" src="{{ $recette->main_image }}"
                                                        alt="recette-{{ $recette->tag }}">
                                                    {{-- <img class="image-medium"
                                                        src="{{ Storage::url($recette->main_image) }}"
                                                        alt="recette-{{ $recette->tag }}"> --}}
                                                </a>

                                                <h2>
                                                    <a
                                                        href="{{ url('recette/details/' . $recette->id) }}">{{ $recette->title }}</a>
                                                </h2>

                                                <p>{{ $recette->summary }}</p>
                                                <div class="tag">
                                                    <a href="#">{{ $recette->tag }}</a>
                                                </div>

                                                <div class="py-2 placehoder d-flex justify-content-center">

                                                    <span
                                                        class="fa fa-heart text-danger p-2"><strong>{{ $recette->likeCount }}</strong>
                                                    </span>

                                                    <form action="{{ route('unlike.recette', $recette->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger text-white  ">
                                                            <i class="fa fa-thumbs-down"></i>
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('like.recette', $recette->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-warning text-white bg-warning">
                                                            <i class="fa fa-thumbs-up"></i>
                                                        </button>
                                                    </form>

                                                </div>

                                                <div class='bg-light  py-2 d-flex justify-content-around'>
                                                    <a href="{{ url('recette/details/' . $recette->id) }}">
                                                        <span
                                                            class="fa fa-eye text-white border-circle  rounded-4 bg-warning p-2 fa fa-eye">
                                                        </span>
                                                    </a>

                                                    <form action="{{ url('recette/supprimer/' . $recette->id) }}"
                                                        method="get">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger text-white border-cirlce ">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>

                                                    <a href="{{ url('recette/modifier/' . $recette->id) }}"> <span
                                                            class="fa fa-edit text-white border-circle  rounded-4 bg-warning p-2">
                                                        </span> </a>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                    <div class="col-lg-12 text-center">
                                        <a href="{{ route('categorie.index') }}" class="btn btn-load">Voir plus de
                                            recettes</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">

                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
