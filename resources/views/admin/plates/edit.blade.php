@extends('layouts.app')

@section('content')
    
<div class="container  nav-fix">

    <h1>Modifica il tuo piatto</h1>
    
    <form action="{{ route('admin.plates.update',$plate) }}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Inserisci il nome del piatto" value="{{old('name') ? old('name') : $plate->name}}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- <div class="form-group">
            <label for="image">Immagine</label>
            <input class="form-control form-control-lg @error('image') is-invalid @enderror" type="text" name="image" placeholder="url immagine piatto" value="{{old('image') ? old('image') : $plate->image}}">
            @error('image')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div> --}}

        <div class="form-group">
            <label for="image">Immagine</label>
            <input accept=".jpg,.png" class="form-control form-control-lg @error('image') is-invalid @enderror" type="file" name="image" value="{{old('image')}}">
            @error('image')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        @foreach ($allergens as $allergen)  
            <div class="form-check form-check-inline">
                <input class="form-check-input" {{$plate->allergens->contains($allergen) ? 'checked' : ''}} type="checkbox" name="allergens[]" id="allergens-{{$allergen->id}}" value="{{$allergen->id}}">
                <label class="form-check-label" for="inlineCheckbox1">{{$allergen->name}}</label>
            </div>
        @endforeach
        @error('allergens')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" id="FormControlTextarea1" name="description" rows="3" placeholder="Inserisci descrizione piatto">{{old('description') ? old('description') : $plate->description }}
            </textarea>
            @error('description')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div>
            <label for="price" class="input-number-label">Prezzo</label>
            <span class="input-number input-number-currency">
                <input type="number" id="price" name="price" step="0.50" value="{{old('price') ? old('price') : $plate->price}}" min="0" max="999.99" />
                <span class="sr-only">Aumenta valore Euro</span>
                <span class="sr-only">Diminuisci valore Euro</span>
            </span>
        </div>

        <div class="select-wrapper my-3">
            <label for="available">Disponibile</label>
            <select id="available" name="available">
                <option value="">Scegli un'opzione</option>
                <option value="1" {{$plate->available == 1 ? 'selected' : ""}}>Disponibile</option>
                <option value="0" {{$plate->available == 0 ? 'selected' : ""}}>Non disponibile</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary my-3">Salva</button>

    </form>
    
</div>

@endsection