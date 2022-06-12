@component('mail::message')
# Congratulazioni {{ $user->name }}! Hai appena ricevuto un ordine.

<div class="cornice"></div>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/admin/orders'])
Visualizza Ordini
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent