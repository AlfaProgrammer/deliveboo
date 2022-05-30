@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea il tuo ristoranete</h2>

        <form action="{{ route('admin.restaurants.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Inserisci il nome del piatto" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Immagine</label>
                <input class="form-control form-control-lg @error('image') is-invalid @enderror" type="text" name="image" placeholder="url immagine piatto" value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="info">Descrizione</label>
                <textarea class="form-control" id="FormControlTextarea1" name="info" rows="3" placeholder="Inserisci il contenuto del post">{{old('info')}}</textarea>
                @error('info')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="cap">CAP</label>
                <input type="text"class="form-control" id="FormControlTextarea1" value="{{old('cap')}}" name="cap" placeholder="CAP" />
                @error('cap')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text"class="form-control" id="FormControlTextarea1" value="{{old('address')}}" name="address" placeholder="Inserisci l'indirizzo" />
                @error('address')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="city">Città</label>
                <input type="text"class="form-control" id="FormControlTextarea1" value="{{old('city')}}" name="city" placeholder="Inserisci città" />
                @error('city')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-3">Crea</button>

        </form>
    </div>
@endsection