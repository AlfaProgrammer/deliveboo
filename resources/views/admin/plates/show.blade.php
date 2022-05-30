@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>{{$plate['name']}}</h1>
        <h3>{{$plate['slug']}}</h3>

        <div>
            Immagine
            <img src="{{$plate['image']}}" alt="">
        </div>
        
        <p>{{$plate['description']}}</p>


        <span>Prezzp: {{$plate['price']}} euro</span>
        {{-- <span>{{$plate->available ? 'Disponibile' : 'Non Disponibile'}}</span> --}}

        @if($plate->available)
            <span class="text-success">Disponibile</span>            
        @else
        <span class="text-danger">Non Disponibile</span>
        @endif
        
        <div class="d-flex align-items-center">
            <form action="{{route('admin.plates.destroy', $plate)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mr-2">
                    Elimina
                </button>
            </form>
            
            <a type="button" href="{{ route('admin.plates.edit',$plate) }}" class="btn btn-warning my-3">Modifica</a>
        </div>
        
    </div>
@endsection
