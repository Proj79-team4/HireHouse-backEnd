@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <form method="POST" action="{{ route('admin.apartments.store') }}" class="row g-3 " enctype="multipart/form-data">
        @csrf

        {{-- Titolo --}}
        <div class="col-md-6">
            <label for="inputTitle" class="form-label">Nome Immobile</label>
            <input type="text" class="form-control" id="inputTitle">
        </div>

        {{-- Check-in --}}
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Check-in</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="10:00 am">
        </div>

        {{-- Check-out --}}
        <div class="col-md-3">
            <label for="inputPassword4" class="form-label">Check-out</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="18:00 pm">
        </div>

        {{-- Indirizzo --}}
        <div class="col-12">
            <label for="inputAddress" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        {{-- Descrizione --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Descrizione</label>
            </div>
        </div>

        {{-- Numero stanze --}}
        <div class="col-md-3">
            <label for="inputRomms" class="form-label">Numero stanze</label>
            <input type="number" class="form-control" id="inputRooms">
        </div>

        {{-- Numero bagni--}}
        <div class="col-md-3">
            <label for="inputBathrooms" class="form-label">Numero bagni</label>
            <input type="number" class="form-control" id="inputBathrooms">
        </div>

        {{-- Numero letti --}}
        <div class="col-md-3">
            <label for="inputBeds" class="form-label">Numero letti</label>
            <input type="number" class="form-control" id="inputBeds">
        </div>

        {{-- Metri quadri --}}
        <div class="col-md-3">
            <label for="inputSquareMeters" class="form-label">Metri quadri</label>
            <input type="number" class="form-control" id="inputSquareMeters">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
        </div>

    </form>

</div>


@endsection