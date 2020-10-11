<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostAction extends Mailable
{

    // ATTENZIONE: questo è un oggetto con cui si compone una mail da mandare.  Viene creato da terminale con php artisan make:mail NomeMail.

    use Queueable, SerializesModels;

    //  NOTE: le variabili (attributi) da utilizzare nella contruct vanno dichiarate prima altrimenti non funziona
    public $user;
    public $post;
    public $action;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $post, $action)
    {
        // la contruct prende tre argomenti dall'esterno. Poi assegnamo al $this -> user (la variabile/attributo $user di questa istanza/oggetto) il valore di $user (quello passato come argomento della funzione contruct) e così via. Nel caso approfondire cercando contruct degli oggetti (questa è un caso base da scuola)
        $this -> user = $user;
        $this -> post = $post;
        $this -> action = $action;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // la funzione build() costruisce la mail. La cosa indispensabile è la view() dove c'è il template html della mail. Qua abbiamo aggiunto un indirizzo from (da cui la mail viene spedita) poi si posso aggiungere molte altre cose/dettagli. https://laravel.com/docs/7.x/mail
        return $this -> from('noreply@boolean.it') 
                     -> view('emails.default');
    }
}
