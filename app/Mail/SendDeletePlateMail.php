<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Plate;

class SendDeletePlateMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $plate;  // variabile dove salvare i dati del costruttore

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Plate $_plate)
    {
        $this->plate = $_plate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->subject('Conferma Eliminazione Piatto')
        ->view('email.deletePlate');
    }
}
