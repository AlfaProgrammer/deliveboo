@component('mail::message')
# Attenzione {{$plate->name}}: 
<h2>è stato eliminato correttamente dal menu.</h2>

<div class="cornice"></div>

<h3>Dettagli Piatto:</h3>
Nome: {{ $plate->name }} <br>
Descrizione: {{ $plate->description ?: '----' }} <br>
Disponibilità: {{ $plate->available ? 'Disponibile' : 'Non disponibile' }} <br>
Prezzo: {{ $plate->price }} &euro;

<div class="cornice"></div>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/plates'])
Accedi
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent