@extends('layouts.app')

@section('content')

<div class="contenitore-big row m-0">

    {{-- --------------------------------------------- --}}

    <div class="col-12 md-col-6 d-flex flex-column">

        <div class="mb-5 mt-2 ml-1">
            <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dashboard</a>
        </div>
        @if ($plates)

        <div class="container row m-0 mt-5">
            <div class="col-9">
                <img class="rounded rounded-lg img-shad-large" src="{{ $user->restaurant->image }}" alt="">
            </div>
            <div class="col-3">
                <h2 class="mb-4">{{$user->restaurant->name}}</h2>
                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary text-nowrap">Crea nuovo piatto</a>
            </div>
        </div>
        
    </div>

    {{-- --------------------------------------------- --}}

    <div class="container-fluid plates-index col-12 md-col-6 over-flow-cont">

        <div class="row">
            
            @foreach ($plates as $plate)
                
            <div class="card-wrapper col-6"> 

                <div class="row card-body justify-content-center">

                    <a href="{{route('admin.plates.show', $plate)}}" class="card d-flex flex-row justify-content-between px-3">
                        <div class="d-flex flex-column align-self-center">
                            
                            <h4 class="title">{{$plate['name']}}</h4>
                            <div class="badge-wrapper">
                                @foreach ($plate->allergens as $allergen)
                                <span class="allergie badge rounded-pill mb-2">{{$allergen->name}}</span>
                                @endforeach
                                <div>
                                    @if ($plate->available)
                                    <p class="text-success mb-2">Disponibile</p> 
                                    @else
                                    <p class="text-danger mb-2">Non Disponibile</p> 
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <img class="card-img-top align-self-center" src="{{ $plate->image ?: '' }}">
                    </a>
                    
                </div>

            </div>
                
            @endforeach
            
        </div>

    </div>

    {{-- --------------------------------------------- --}}

    @endif
</div>

    {{-- @foreach ($plates as $plate)
            
            <div class="">
                <div>
                    <img src="{{ $plate->image ?: '' }}" style="width: 100px">
                    <a href="{{route('admin.plates.show', $plate)}}">{{$plate['name']}}</a>
                </div>
                
                @foreach ($plate->allergens as $allergen)
                <span class="badge rounded-pill bg-success mb-2">{{$allergen->name}}</span>
                @endforeach
                
        @endforeach

            </div> --}}

            {{-- CARDS --}}
            {{-- ----------------------- --}}
            
            {{-- <div class="border border-danger">
                
                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
                <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>
                
            </div> --}}
 
@endsection
