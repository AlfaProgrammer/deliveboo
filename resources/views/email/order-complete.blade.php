@component('mail::message')
# Congratulazioni! Ordine Completato!

Gentile {{ $order['name'] . ' ' . $order['surname'] }}, il tuo ordine è completo.<br>
Attendi ancora qualche minuto per riceverlo all'indirizzo che hai indicato in fase di ordinazione. <br>
<div class="cornice"></div>
<h3>Riepilogo ordine:</h3>
Indirizzo: {{ $order['address'] . ' ' . $order['house_number'] }} <br>
Città: {{ $order['city'] }} <br>
Totale: {{ $order['total_price'] }} &euro; <br>


@component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Hai ancora fame ?
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
