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

                        <h5 class="text-center text-warning"> {{ __('Tableau de bord +') }} </h5>
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

                    <ul class="nav nav-pills m-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active  w-100" data-toggle="tab" href="#tabs-1"
                                role="tab">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link w-100" data-toggle="tab" href="#tabs-2" role="tab">Messagerie
                            </a>
                        </li>

                    </ul><!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div>
                                <table class="table">
                                    <thead class="thead-Dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Profil</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Satut</th>
                                            <th scope="col">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataUsers as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <th scope="row"> <img width=60 height=60
                                                        class=" img-fluid rounded-circle"
                                                        src="{{ Storage::url($user->photo) }}" alt="avatar"></th>
                                                <th scope="row">{{ $user->name }}</th>
                                                <th scope="row">{{ $user->surname }}</th>
                                                <th scope="row">{{ $user->username }}</th>
                                                <th scope="row">{{ $user->email }}</th>
                                                <th scope="row">
                                                    @if ($user->is_admin == true)
                                                        <p>
                                                            <i class="fa fa-chess-king text-warning " data-toggle="tooltip"
                                                                title="Administrateur"> </i> Admin
                                                        </p>
                                                    @else
                                                        <p>

                                                            <i class='fa fa-user text-warning'>Utilisateur</i>
                                                        </p>
                                                    @endif
                                                </th>
                                                <th scope="row">
                                                    <div class="d-flex">

                                                        <button class="btn btn-warning text-white" type="submit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <form action="{{ route('user.destroy', $user->id) }}"
                                                            method='delete'>
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="function(event) {event.preventDefault();}"
                                                                class="btn btn-danger text-white">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>

                                                    </div>



                                                </th>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <section aria-label="Page navigation d-flex jsutify-content-center align-items-center">
                                    <ul class="pagination">
                                        {{ $dataUsers->links() }}
                                    </ul>
                                </section>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <section class="d-flex justify-content-center align-items-center bg-dark p-4">
                                <h3>Messagerie</h3>
                            </section>

                            <div class="container-fluid mt-5">

                                <div class="row  d-flex justify-content-center">

                                    <div class="col-md-8">

                                        <div class="headings d-flex justify-content-between align-items-center mb-3">
                                            <p class="text-light h3">Messages({{ count($messages) }})</p>

                                        </div>


                                        @foreach ($messages as $message)
                                            <div class="card p-3 my-3 animated wow slideUp shadow">

                                                <div class="d-flex justify-content-between align-items-center">

                                                    <div class="user d-flex flex-row align-items-center">

                                                        <div width="30" class="fa fa-user rounded-circle mr-2"></div>
                                                        <span>
                                                            <div class="font-weight-bold text-warning">
                                                                {{ $message->nom }}
                                                            </div>

                                                            <div class="font-weight-bold text-muted small">
                                                                {{ $message->details }}
                                                            </div>

                                                        </span>

                                                    </div>


                                                    <small class="col-4-md">{{ $message->created_at }}</small>

                                                </div>


                                                <div class="action d-flex justify-content-between mt-2 align-items-center">


                                                    <div class="icons align-items-center">


                                                        <i class="fa fa-delete text-danegr"></i>

                                                    </div>

                                                </div>

                                                <form action="{{ url('/message/supprimer/' . $message->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger text-white border-cirlce ">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>



                                            </div>
                                        @endforeach



                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
