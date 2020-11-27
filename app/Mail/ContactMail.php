<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $name;
    public $topic;
    public $email;

    public function __construct($name, $topic, $message, $email)
    {
        $this->topic = $topic;
        $this->message = $message;
        $this->name = $name;
        $this->email = $email;
    }

    public function build()
    {
        return $this->markdown('_globals.email.contact')
            ->from($this->email)
            ->subject($this->topic);
    }
}
