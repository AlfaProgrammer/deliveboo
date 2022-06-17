@component('mail::message')
# Congratulazioni {{ $user->name }}! Hai appena ricevuto un ordine.

<div class="cornice"></div>

<h3>Dati Destinario:</h3>
Nome: {{$order['name'] . ' ' . $order['surname']}} <br>
Indirizzo di spedizione: {{ $order['address'] . ' ' . $order['house_number'] }} <br>
Città: {{ $order['city'] }} <br>

<div class="cornice"></div>

<h3>Dati Ordine:</h3>
Ordine n. : {{ $order['id'] }} <br>
Totale: {{ $order['total_price'] }}&euro; <br>

<div class="cornice"></div>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/orders'])
Visualizza Ordini
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent