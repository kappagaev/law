<?php


namespace App\Services;


use App\Mail\RequestCreateMail;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class RequestMailService
{
    public function created(Request $rm)
    {

        $docxTemplate = new DocxService('template.docx', 'request_' . $rm->id);
        $docx = $docxTemplate
            ->handleRequestModel($rm)
            ->save()
            ->getName();

        Mail::to(config('mail.REQUEST_CREATED_MAIL_TO'))->send(new RequestCreateMail($rm, $docx, $rm->all_files_paths));


    }
}
