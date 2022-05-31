@extends('layouts.app')

@section('content')

    @if($restaurant)
    
        <div class="container">

            <h2>DashBoard</h2>
<<<<<<< HEAD
            <p>Questa è la tua dashboard</p>
            <h3><a href="{{route('admin.plates.index')}}">{{ $restaurant->user->company_name}}</a></h3>

            @foreach ($restaurant->categories as $category)
            <span class="badge rounded-pill bg-success mb-2">{{$category->name}}</span>
            @endforeach

            <p class="description">
                {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
            </p>
            
=======
            <p>Cioa {{$user->name}}</p>
            <p>
                Questa è la tua dashboard. Da qui puoi visualizzare la preview del tuo ristorante e
                accedere al menu dello stesso cliccando sull apposito tasto.
            </p>

            <h3><a href="{{route('admin.plates.index')}}">{{ $user->company_name}}</a></h3>
            <p class="description">
                {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
            </p>

            {{-- <div>
                Immagine
                @if($restaurant->image)
                <img src="{{ asset('storage/'.$restaurant->image) }}" height="50" alt="">
                @endif
            </div> --}}

>>>>>>> 1a04e2e8221bdd920c010d5a9a0c9da03f4b18b9
            <a href="{{route('admin.plates.index')}}" type="button" class="btn btn-primary">Visualizza Piatti</a>
        </div>        

    @else 

        <div class="container">
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary">Crea Ristorante</a>
        </div>
        
    @endif
@endsection 