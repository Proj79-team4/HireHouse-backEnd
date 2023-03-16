@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mt-5">
            @foreach($sponsors as $sponsor)
            <div class="col mt-5">
                <div class="card mt-5">
                    <h3 class="card-header">
                        {{$sponsor->name}}
                    </h3>
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">Scegli questa sponsorizzazione per una durata di: <strong>{{$sponsor->hours}} ore</strong> </p>
                        <a href="{{route('payment.show')}}" class="btn my-btn-orange">{{$sponsor->price}} €</a>
                    </div>
                </div>

            </div>
                
            @endforeach

        </div>
       
            
    </div>
    

@endsection
