@extends('layouts.app')

@section ('content')

<div class="container">
    <h2 class="mt-5">MESSAGGI</h2>

    <table class="table table-striped mt-5">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Contenuto</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                
            <tr>
                <th scope="row"></th>
                <td>{{$message->name}}</td>
                <td>{{$message->email}}</td>
                <td>{{$message->content}}</td>
            </tr>
            
            
            @endforeach
        </tbody>
      </table>

</div>

@endsection