@extends('layouts.main')
@section('title')
    Remerciement
@endsection

@section('main')
    @if (session()->has('message'))
        <script>
            setTimeout(function() {
                window.location.href = "{{ route('pageAccueil') }}";
            }, 2000); // 2 second
        </script>
    @endif

    <div class="wrapper py-5 h-100">
        <div class="jumbotron text-center  ">
            <h4 class="display">Votre mail emvoyé avec succès</h4>
            <p class="lead"><strong> votre mail a été envoyé avec succès !</p>
            <hr>
            <p>
                <a class="btn btn-warning text-white" href="{{ route('pageAccueil') }}">Page d'Accueil</a>
        </div>
    </div>
@endsection
