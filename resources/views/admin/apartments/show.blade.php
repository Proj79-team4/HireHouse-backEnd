@extends('layouts.app')

@section('content')
    <div class="container py-3 apartment-show">
        <h1>{{ $apartment->title }}</h1>
        <div class="d-flex  align-items-center justify-content-between">
            <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn bg-azzurro">
                    Visualizzazioni <span class="badge bg-turchese ms-2">{{ $apartment->views->count() }}</span>
                  </button>
                <div class="fw-bold">{{ $apartment->full_address }}</div>

            </div>
            <div class="">
                <a href="{{route("admin.apartments.edit",$apartment->id)}}" class="btn my-btn-sabbia">Modifica</a>
           </div>

        </div>
        <div class="py-3 thumb-img-container ">
            <img src="{{ asset('storage/' . $apartment->cover_img) }}" alt="">
            
        </div>
        <div>

            <h5>Descrizione</h5>
            <p>{{ $apartment->description }}</p>
            <div class="row py-3">
                <div class="col-4">
                    <h5>Informazioni</h5>
                    <ul class="list-group">
                        <li class="list-group-item">Numero di bagni: <span
                                class="">{{ $apartment->num_bathrooms }}</span></li>
                        <li class="list-group-item">Numero di letti: <span
                                class="">{{ $apartment->num_beds }}</span></li>
                        <li class="list-group-item">Numero di stanze: <span
                                class="">{{ $apartment->num_rooms }}</span></li>
                        <li class="list-group-item">Metri quadri:<span
                                class="">{{ $apartment->square_meters }} mq</span></li>
                                
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item"> <span
                            class="">{{ $apartment->visibile===1 ? "Visibile" : "Non visibile" }}</span></li>
                    </ul>

                </div>
                <div class="col-4">
                    <h5>Regole</h5>

                    <ul class="list-group">
                        @foreach ($apartment->rules as $rule)
                            <li class="list-group-item">
                                <span class=" me-2">
                                    {{ $rule->name }}
                                </span>
                                <i class="fa-solid {{ $rule->icon }}"></i>
                            </li>
                        @endforeach
                    </ul>



                </div>
                <div class="col-4">
                    <h5>Servizi</h5>

                    <ul class="list-group">
                        @foreach ($apartment->services as $service)
                            <li class="list-group-item">
                                <span class=" me-2">
                                    {{ $service->name }}
                                </span>
                                <i class="fa-solid {{ $service->icon }}"></i>
                            </li>
                        @endforeach
                    </ul>



                </div>
            </div>

        </div>
    </div>
@endsection
