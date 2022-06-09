@extends('layouts.app')

@section('content')



    {{-- @if($restaurant)
    
        <div class="container restaurant-index">

            <p>Ciao {{$user->name}}</p>
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
        
    @endif --}}

    <section class="img-restaurant-index d-flex align-items-center">
    
        @if($restaurant)
            
        <div class="splash-container d-flex flex-column justify-content-center align item-center">
            <div class="user-welcome text-center align-self-center">
                <h3 class="user">Ciao {{$user->name}}</h3>
                <p>
                    Questa è la tua dashboard. Da qui puoi visualizzare la preview del tuo ristorante e
                    accedere al menu dello stesso cliccando sull apposito tasto.
                </p>
            </div>
            
            <div class="splash">
                <h1 class="splash-head">{{ $user->restaurant->name }}</h1>
                @if($restaurant->categories)
                    <div class="categories d-flex row gap-3">
                        @foreach ($restaurant->categories as $category)
                            <span class="badge rounded-pill">{{$category->name}}</span>
                        @endforeach
                    </div>

                @endif
                <p class="splash-subhead">
                    {{$restaurant->info ? $restaurant->info : 'Nessuna descrizione'}}
                </p>
                <p class="buttons-wrapper d-flex">
                    <a href="{{route('admin.plates.index')}}" class="pure-button">Visualizza Piatti</a>
                    <a href="{{route('admin.orders.index')}}" type="button" class="pure-button">Visualizza Ordini</a>
                </p>
               
                
            </div>
        </div>
        
        @else 
    
        <div class="splash-container d-flex flex-column justify-content-center align item-center">
            <div class="user-welcome text-center align-self-center">
                <h3 class="no-restaurant">Ciao {{$user->name}}</h3>
                <p>
                    Non hai ancora creato il tuo ristorante
                </p>
            </div>
            
            <div class="splash">
                
                <p>
                    <a href="{{ route('admin.restaurants.create') }}" class="pure-button">Crea Ristorante</a>
                </p>
            </div>
        </div>
            
        @endif
    
    </section>
    
    
    





@endsection 