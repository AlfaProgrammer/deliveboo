@extends('layouts.app')

@section('content')
    @if($restaurant_exists)
        <div class="container">
            <h2>DashBoard</h2>
            <p>Questa è la tua dashboard</p>
            <h3><a href="{{route('admin.plates.index')}}">{{ $restaurant->user->company_name}}</a></h3>
            @foreach ($restaurant->categories as $category)
            <span class="badge rounded-pill bg-success mb-2">{{$category->name}}</span>
            @endforeach
            <p class="description">
                {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
            </p>
            <a href="{{route('admin.plates.index')}}" type="button" class="btn btn-primary">Visualizza Piatti</a>
        </div>        
    @else 
        <div class="container">
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Crea Ristorante</a>
        </div>
        
    @endif
@endsection 