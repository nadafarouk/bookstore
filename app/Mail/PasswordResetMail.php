<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $passwordReset;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($passwordReset)
    {
        $this->queue='passwordReset';
        $this->passwordReset= $passwordReset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.passwordReset')->with(['passwordReset' => $this->passwordReset]);
    }
}
