<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\FeedbackEmail;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('feedback/create')->with('title', 'Зворотній зв\'язок');
    }

    public function store(FeedbackRequest $request)
    {
        $feedback = Feedback::create($request->validated());

        Mail::to(config('mail.FEEDBACK_EMAIL'))->send(new FeedbackEmail($feedback));

        return redirect('/')->with('message', 'Відправлено');
    }
}
