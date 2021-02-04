<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationProveMail extends Mailable
{
    use Queueable, SerializesModels;

    private $registration;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\UserRegistration $registration
     */
    public function __construct(\App\Models\UserRegistration $registration)
    {
        //
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail/registration-prove')->with('registration', $this->registration);
    }
}
