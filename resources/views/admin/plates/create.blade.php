@extends('layouts.app')

@section('content')

    <div class="container nav-fix">

        <h1>Inserisci un nuovo piatto</h1>
        <p><i>I campi contrassegnati con * sono obbligatori</i></p>

        
        <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            
            <div class="form-group">
                <label for="name">Nome*</label>
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" placeholder="Inserisci il nome del piatto" value="{{old('name')}}" required>
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

            @foreach ($allergens as $allergen)  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="allergens[]" id="allergens-{{$allergen->id}}" value="{{$allergen->id}}">
                    <label class="form-check-label" for="inlineCheckbox1">{{$allergen->name}}</label>
                </div>
                @error('allergens')
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
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="FormControlTextarea1" name="description" rows="3" placeholder="Inserisci descrizione piatto">{{old('description')}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="price" class="input-number-label">Prezzo*</label>
                <span class="input-number input-number-currency">
                    <input class="form-control @error('price') is-invalid @enderror" type="number" id="price" name="price" step="0.01" placeholder="Es: 15.99" min="0" max="999.99" required/>
                    <span class="sr-only">Aumenta valore Euro</span>
                    <span class="sr-only">Diminuisci valore Euro</span>
                </span>
                @error('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="select-wrapper my-3" required>
                <label for="available">Disponibile*</label>
                <select id="available" name="available" class="custom-select">
                    <option value="">Scegli un'opzione</option>
                    <option value="1">Disponibile</option>
                    <option value="0">Non disponibile</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary my-3 mr-3">Aggiungi</button>

            <a href="{{ route('admin.plates.index') }}" class="btn btn-warning">Torna ai piatti</a>

        </form>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
        </script>
        
    </div>
    
@endsection    