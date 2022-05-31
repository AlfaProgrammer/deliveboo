@extends('layouts.app')

@section('content')

    @if($restaurant)
    
        <div class="container">

            <p>Cioa {{$user->name}}</p>
            <p>
                Questa è la tua dashboard. Da qui puoi visualizzare la preview del tuo ristorante e
                accedere al menu dello stesso cliccando sull apposito tasto.
            </p>

            <h3><a href="{{route('admin.plates.index')}}">{{ $user->company_name}}</a></h3>

            @if($restaurant->categories)

                @foreach ($restaurant->categories as $category)
                    <span class="badge rounded-pill bg-success mb-2">{{$category->name}}</span>
                @endforeach

            @endif

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