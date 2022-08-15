<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->username = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Account Status Update')
                    ->markdown('vendor.notifications.email', [
                        'actionUrl' => route('home'),
                        'displayableActionUrl' => route('home'),
                        'greeting' => 'Hello, '. $this->username,
                        'level' => '3',
                        'introLines' => ['Your Account status has been updated by the admin.',
                        'You can now login to send messages to admin'],
                        'actionText' => 'Login',
                        'outroLines' => ['Thank you for using our application!'],
                    ]);
    }
}
