@component('mail::message')
# Congratulazioni! Ordine Completato!

Gentile {{ $order['name'] . ' ' . $order['surname'] }}, il tuo ordine è completo.<br>
Attendi ancora qualche minuto per riceverlo all'indirizzo che hai indicato in fase di ordinazione. <br>

<div class="cornice"></div>

@component('mail::table')
<h3>Dettaglio ordine:</h3>
<table>
    <tr>
        <th>Articolo</th>
        <th>Quantità</th>
        <th>Prezzo</th>
    </tr>
    @foreach ($cart as $plate)
    <tr>
        <td>{{ $plate['name'] }}</td>
        <td class="text-center">{{ $plate['quantity'] }}</td>
        <td class="text-right">{{ $plate['price'] }} &euro;</td>
    </tr>
    @endforeach
    <tr>
        <td class="total">Totale</td>
        <td></td>
        <td class="total text-right">{{ $order['total_price'] }} &euro;</td>
    </tr>
</table>
@endcomponent

<div class="cornice"></div>

<h3>Dati di Spedizione:</h3>
Nome: {{ $order['name'] . ' ' . $order['surname'] }} <br>
Indirizzo: {{ $order['address'] . ' ' . $order['house_number'] }} <br>
Cap: {{ $order['cap'] }} <br>
Città: {{ $order['city'] }} <br>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Hai ancora fame ?
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
