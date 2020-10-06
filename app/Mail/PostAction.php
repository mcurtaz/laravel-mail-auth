<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostAction extends Mailable
{
    use Queueable, SerializesModels;

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
        return $this -> from('noreply@boolean.it') 
                     -> view('emails.default');
    }
}
