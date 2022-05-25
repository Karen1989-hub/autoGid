<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Registrmail extends Mailable
{
    use Queueable, SerializesModels;
    public $remember_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remember_token)
    {
        $this->remember_token = $remember_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('registrmail')->with('remember_token',$this->remember_token);
    }
}
