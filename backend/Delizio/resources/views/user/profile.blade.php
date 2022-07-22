@extends('layouts.main')
@section('title')
    Espace utilisateur
@endsection

@section('main')
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->

        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header bg-dark text-warning">Avatar</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img width='200' class="img-account-profile rounded-circle mb-2"
                            src="{{ Storage::url($userInfo->photo) }}" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">SVG, JPG ou PNG ne pas dépassé 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-warning text-white" type="button">changer mon profile</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-warning">Details de compte</div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nom d'utilsiateur </label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="{{ $userInfo->username }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Prénom</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" value="{{ $userInfo->name }}">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Nom</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter your last name" value="{{ $userInfo->surname }}">
                                </div>
                            </div>
                            <!-- Form Row        -->

                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Adresse E-mail</label>
                                <input class="form-control" id="inputEmailAddress" type="email"
                                    placeholder="Enter your email address" value="{{ $userInfo->email }}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->

                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">
                                        @if ($userInfo->is_admin == false)
                                            <p class="btn btn-warning text-white"><i class="fa fa-user "></i> Rôle:
                                                Utilisateur</p>
                                        @elseif ($userInfo->is_admin == true)
                                            <p class="btn btn-warning  text-white"><i class="fa fa-chess-king"></i> Rôle:
                                                Admin</p>
                                        @endif
                                    </label>

                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-warning text-white" type="button">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
