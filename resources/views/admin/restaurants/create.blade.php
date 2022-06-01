@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea il tuo ristoranete</h2>

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Inserisci il nome del ristorante" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Immagine</label>
                <input accept=".jpg,.png" class="form-control form-control-lg @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            @foreach ($categories as $category)  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="categories[]" id="categories-{{$category->id}}" value="{{$category->id}}">
                    <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
                </div>
                @error('categories')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            @endforeach
            {{-- <div class="form-group">
                <label for="image">Immagine</label>
                <input class="form-control form-control-lg @error('image') is-invalid @enderror" type="text" name="image" placeholder="url immagine piatto" value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div> --}}
            
            <div class="form-group">
                <label for="info">Descrizione</label>
                <textarea class="form-control" id="FormControlTextarea1" name="info" rows="3" placeholder="Inserisci Descrizione">{{old('info')}}</textarea>
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