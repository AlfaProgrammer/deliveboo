<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>

    <div class="container">

        <h1>Inserisci un nuovo piatto</h1>
        
        <form action="{{ route('admin.plates.store') }}" method="POST">
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
                <input class="form-control form-control-lg @error('image') is-invalid @enderror" type="text" image="image" placeholder="url immagine piatto" value="{{old('image')}}">
                @error('image')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" id="FormControlTextarea1" name="description" rows="3" placeholder="Inserisci il contenuto del post">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div>
                <label for="price" class="input-number-label">Prezzo</label>
                <span class="input-number input-number-currency">
                    <input type="number" id="price" name="price" step="0.50" value="0.00" min="0" max="999.99" />
                    <span class="sr-only">Aumenta valore Euro</span>
                    <span class="sr-only">Diminuisci valore Euro</span>
                </span>
            </div>

            <div class="select-wrapper my-3">
                <label for="available">Disponibile</label>
                <select id="available">
                  <option selected="" value="">Scegli un'opzione</option>
                  <option value="1">Disponibile</option>
                  <option value="0">Non disponibile</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary my-3">Aggiungi</button>

        </form>
        
    </div>

</body>
</html>