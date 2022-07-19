@extends('layouts.main')
@section('title')
    Vérification
@endSection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifier votre adresse mail') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Un lien contient le lien de la réinitialisation a été envoyé vers votre boite mail.') }}
                            </div>
                        @endif

                        {{ __('avant de poursuivre veuillez verifier le lien sur votre boîte mail') }}
                        {{ __('si vous n\'avez pas toujours reçu l\'email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour réenvoyer') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
