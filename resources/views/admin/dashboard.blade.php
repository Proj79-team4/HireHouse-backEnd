@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <h2 class="lead">{{ Auth::user()->email }}</h2>
        <h6>I tuoi appartamenti:</h6>
        <div class="row">
            @foreach ($apartments as $apartment)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title ." #". $apartment->id }}</h5>
                        <p class="card-text">{{ $apartment->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Prezzo:{{ $apartment->price }}</li>


                        <label class="list-group-item form-switch">
                            Visibilità
                            <input type="checkbox" value="" class="form-check-input float-end" {{$apartment->visibile ? "checked" : ""}}>



                    </ul>
                    <div class="card-body">
                        <a href="{{route("admin.apartments.show" , $apartment->id)}}" class="card-link">
                           Maggiori informazioni
                        </a>
                        <a href="{{route("admin.apartments.edit" , $apartment->id)}}" class="card-link">Modifica</a>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
