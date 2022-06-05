
@extends('layouts.app')

@section('content')
    <div class="container" >
        @if ($plates)
        <div class="d-flex flex-column mb-5">
            <h3>{{$user->restaurant->name}}</h3>
            <img src="{{ $user->restaurant->image }}" alt="">
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

                {{-- ----------------------- --}}
                {{-- CARDS --}}

                <div class="row">

                    <div class="row mb-5">

                    @foreach ($plates as $plate)

                        <div class="card col-3">

                            <img class="card-img-top" src="{{ $plate->image ?: '' }}" style="width: 100%">

                            <div class="card-body d-flex flex-column">
                                <a href="{{route('admin.plates.show', $plate)}}">{{$plate['name']}}</a>
                                <div>
                                    @foreach ($plate->allergens as $allergen)
                                    <span class="badge rounded-pill bg-success mb-2">{{$allergen->name}}</span>
                                    @endforeach
                                </div>

                            </div>

                        </div>

                    @endforeach

                    </div>

                </div>

                {{-- CARDS --}}
                {{-- ----------------------- --}}
                
                <div>
                    
                    <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
                    <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>
                    
                </div>

        @endif
    </div>
        
@endsection
