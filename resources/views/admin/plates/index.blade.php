@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>
        </div>
    </div>
    @if ($plates)
    <div class="mb-5 row">
        <div class="col-7">
            <img class="rounded rounded-lg img-shad-large" src="{{ $user->restaurant->image }}" alt="">
        </div>
        <div class="col-5">
            <h3 class="mb-4">{{$user->restaurant->name}}</h3>
            <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
        </div>
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

            <div class="container-fluid plates-index">

                <div class="row mb-5 mx-3">

                @foreach ($plates as $plate)

                    <div class="card-wrapper col-6 col-md-4 col-lg-3 py-3 ">
                            
                        <a href="{{route('admin.plates.show', $plate)}}" class="card">

                            <img class="card-img-top" src="{{ $plate->image ?: '' }}">

                            <div class="card-body d-flex flex-column" >
                                <h5 class="title">{{$plate['name']}}</h5>
                                <div class="badge-wrapper">
                                    @foreach ($plate->allergens as $allergen)
                                    <span class="badge rounded-pill mb-2">{{$allergen->name}}</span>
                                    @endforeach
                                </div>

                            </div>
                        </a>

                    </div>


                @endforeach

                </div>

            </div>

            {{-- CARDS --}}
            {{-- ----------------------- --}}
            
            {{-- <div class="border border-danger">
                
                <a href="{{ route('admin.plates.create') }}" class="btn btn-primary">Crea nuovo piatto</a>
                <a href="{{ route('admin.home') }}" class="btn btn-warning">Torna alla dasboard</a>
                
            </div> --}}

    @endif
</div>
        
@endsection
