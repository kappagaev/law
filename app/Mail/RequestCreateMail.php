<?php

namespace App\Mail;

use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RequestCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $request;
    /**
     * attached files paths
     * @var array
     */
    private $files;

    private $docx;

    /**
     * Create a new message instance.
     *
     * @param Request $request
     * @param $docx
     * @param array $files
     */
    public function __construct(Request $request, $docx, $files = [])
    {
        $this->request = $request;
        $this->files = $files;
        $this->docx = $docx;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.OUR_MAIL'))
                    ->view('mail.requestCreated')
                    ->attachFiles();
    }

    private function attachFiles()
    {
        $this->attach(storage_path($this->docx));

        if (!empty($this->files)) {
            foreach ($this->files as $fileArray) {
                foreach ($fileArray as $file) {
                    $this->attach(storage_path($file));
                }
            }
        }
        return $this;
    }
}
