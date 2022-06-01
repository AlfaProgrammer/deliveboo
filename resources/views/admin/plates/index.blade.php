
@extends('layouts.app')

@section('content')
    <div class="container" >
        @if ($plates)
        <h3>{{$user->restaurant->name}}</h3>
        <img src="{{ $user->restaurant->image }}" alt="">
            @foreach ($plates as $plate)
                <div>
                    <img src="{{ $plate->image ?: '' }}" style="width: 100px">
                    <a href="{{route('admin.plates.show', $plate)}}">{{$plate['name']}}</a>
                </div>

                @foreach ($plate->allergens as $allergen)
                    <span class="badge rounded-pill bg-success mb-2">{{$allergen->name}}</span>
                @endforeach

            @endforeach

            <div>
                
                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
                <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>

            </div>
        @endif
    </div>
        
@endsection
