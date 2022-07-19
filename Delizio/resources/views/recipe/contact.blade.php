@extends('layouts.main')

 

@section('title')
Prise de contact
@endsection

@section('main')
     <div class="page contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 title text-center">
                    <h1>Formulaire de Contact</h1>
                </div>
                <div class="col-lg-8 content">
                    <form action="{{route('message.create')}}" method="POST">

                        @csrf
                        
                        <div class="form-group">
                            <label>Nom complet</label>
                            <input type="text"  name="nom" class="form-control">
                              @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Adresse E-mail</label>
                            <input type="email" name="email" class="form-control" required="required">
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Sujet</label>
                            <input type="text" name="sujet" class="form-control" required="required">
                              @error('sujet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="details" class="form-control" rows="4" required="required" placeholder="Saisissez votre message ici"></textarea>
                              @error('details')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <button type="submit" class="btn">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endSection