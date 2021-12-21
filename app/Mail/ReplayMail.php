<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplayMail extends Mailable
{
    use Queueable, SerializesModels;
    public $replay;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replay,$message)
    {
        $this->replay = $replay;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.replay');
    }
}