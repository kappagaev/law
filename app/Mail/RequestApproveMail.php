<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Request
     */
    private $request;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Request $rm
     */
    public function __construct(\App\Models\Request $rm)
    {
        //
        $this->request = $rm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail/request-approve')->with('request', $this->request);
    }
}
