@component('mail::message')
# Congratulazioni! Ordine Completato!

Gentile cliente, il tuo ordine è completo.<br>
Attendi ancora qualche minuto per riceverlo all'indirizzo che hai indicato in fase di ordinazione.



@component('mail::button', ['url' => ''])
Torna al tuo ordine
@endcomponent

Grazie,<br>
{{ config('app.name') }}
@endcomponent
