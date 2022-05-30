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


        <span>{{$plate['price']}}</span>
        <span>{{$plate->available ? 'Disponibile' : 'Non Disponibile'}}</span>

        <form action="{{route('admin.plates.destroy', $plate)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">
                Elimina
            </button>
        </form>

        <button>
            <a href="{{ route('admin.plates.edit',$plate) }}">Modifica</a>
        </button>
    </div>
@endsection
