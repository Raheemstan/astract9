<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('abiolar544@gmail.com')
                    ->subject('Account Activated')
                    ->with(['Hello,' + $this->message])
                    ->view('mail');
    }
}
