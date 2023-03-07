@extends('layouts.app')

@php

// Funzione che ritorna il conteggio dei messaggi per ogni appartamento
function countmessage ($listaAppartamenti){
$counter = 0;
foreach ($listaAppartamenti as $apartment) {

$counter += $apartment->messages()->count();


}

return $counter;
}

@endphp

@section('content')
<div class="container user-dashboard py-3">

    <div class="row mt-5">
        {{-- Lista appartamenti --}}
        <div class="col-8">

            <a href="{{ route('admin.apartments.create')}}" class="btn my-btn-turchese mb-5">
                <i class="fa-solid fa-plus"></i> Crea
            </a>

            <h5 class="fw-bold">I TUOI ANNUNCI:</h5>
            <div class="row mt-5">
                @foreach ($apartments as $apartment)
                <div class="card p-0" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $apartment->title ." #". $apartment->id }}</h5>
                        <p class="card-text">{{ $apartment->description }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Prezzo:{{ $apartment->price }}</li>


                        <label class="list-group-item form-switch">
                            Visibilità
                            <input type="checkbox" value="" class="form-check-input float-end" {{$apartment->visibile ?
                            "checked" :
                            ""}}>



                    </ul>
                    <div class="card-body">
                        <a href="{{route('admin.apartments.show' , $apartment->id)}}" class="card-link">
                            Maggiori informazioni
                        </a>
                        <a href="{{route('admin.apartments.edit' , $apartment->id)}}" class="card-link">Modifica</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        {{-- Informazioni utente --}}
        <div class="col-4">

            <div>
                <div class="row d-flex align-items-center h-100">
                    <div class="col col-md-9 col-lg-7 col-xl-5">
                        <div class="card background-image-profile" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}"
                                            alt="Generic placeholder image" class="img-fluid"
                                            style="width: 180px; border-radius: 10px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">{{ Auth::user()->name . ' ' . Auth::user()->surname }}</h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ Auth::user()->email }}</p>
                                        <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                            style="background-color: turchese;">
                                            <div>
                                                <p class="small text-muted mb-1">Appartamenti</p>
                                                <p class="mb-0">{{ Auth::user()->apartments()->count() }}</p>
                                            </div>
                                            <div class="px-3">
                                                <p class="small text-muted mb-1">Messaggi</p>
                                                <p class="mb-0">{{countmessage($apartments)}}</p>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-1">
                                            <button type="button"
                                                class="btn my-btn-outline-sabbia me-1 flex-grow-1">Chat</button>
                                            <button type="button"
                                                class="btn my-btn-sabbia flex-grow-1">STATISTICHE</button>
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





</div>
@endsection