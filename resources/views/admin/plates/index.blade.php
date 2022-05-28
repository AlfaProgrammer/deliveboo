
@extends('layouts.app')

@section('content')

    <div class="container">

        @foreach ($plates as $plate)
            <div>{{$plate['name']}}</div>
    
            <div>- {{$plate->restaurant->name}}</div>
        @endforeach

        <div>
            
            <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>

        </div>

    </div>
        
@endsection
