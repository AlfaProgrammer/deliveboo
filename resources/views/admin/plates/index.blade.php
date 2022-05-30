
@extends('layouts.app')

@section('content')
    <div class="container" >
        @if ($plates)
        <h3>{{$user->restaurant->name}}</h3>
            @foreach ($plates as $plate)
                <div>
                    <a href="{{route('admin.plates.show', $plate)}}">{{$plate['name']}}</a>
                </div>
            
                
            @endforeach

            <div>
                
                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
                <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>

            </div>
        @endif
    </div>
        
@endsection
