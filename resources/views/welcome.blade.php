@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">
                Welcome to
            </h1>
            <div class="logo_laravel">
                <img src="{{ asset('storage/logo-bianco.png') }}" class="img-fluid "
                            alt="">
            </div>

            {{-- <p class="col-md-8 fs-4">This a preset package with Bootstrap 5 views for laravel projects including laravel breeze/blade. It works from laravel 9.x to the latest release 10.x</p>
        <a href="https://packagist.org/packages/pacificdev/laravel_9_preset" class="btn btn-primary btn-lg" type="button">Documentation</a> --}}
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h4>Ciao! benvenuto su Hirehouse, un nuovo sito che ti permetterà di gestire con pochi click i tuoi immobili in
                maniera pratica e veloce. Registrati subito!</h4>
        </div>
    </div>
@endsection
