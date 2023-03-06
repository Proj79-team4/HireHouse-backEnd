@extends('layouts.app')

@section('content')
    <div class="container py-3 apartment-show">
        <h1>{{ $apartment->title }}</h1>
        <div class="d-flex ">
            <div class="me-2 fw-bold text-decoration-underline">{{ $apartment->views->count() }} views</div>
            <div>{{ $apartment->full_address }}</div>

        </div>
        <div class="py-3 thumb-img-container">
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
                                class="text-decoration-underline">{{ $apartment->num_bathrooms }}</span></li>
                        <li class="list-group-item">Numero di letti: <span
                                class="text-decoration-underline">{{ $apartment->num_beds }}</span></li>
                        <li class="list-group-item">Numero di stanze: <span
                                class="text-decoration-underline">{{ $apartment->num_rooms }}</span></li>
                        <li class="list-group-item">Metri quadri:<span
                                class="text-decoration-underline">{{ $apartment->square_meters }} mq</span></li>
                    </ul>

                </div>
                <div class="col-4">
                    <h5>Regole</h5>

                    <ul class="list-group">
                        @foreach ($apartment->rules as $rule)
                            <li class="list-group-item">
                                <span class="text-decoration-underline me-2">
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
                                <span class="text-decoration-underline me-2">
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
