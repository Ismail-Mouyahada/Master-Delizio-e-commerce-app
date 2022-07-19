@extends('layouts.main')
@section('title')
    Créer une categorie
@endsection
@section('main')
    <!-- Submit Recipe-->
    <div class="submit">
        <div class="title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Creation des catégories</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <form method='POST' action='{{ route('categorie.store') }}' enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Créer une catégorie</label>
                                <input type="text" name="nom" class="form-control">
                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-submit">Créer</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
