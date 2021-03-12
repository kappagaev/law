<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistraionNotificationRequest;
use App\Models\RegistrationNotification;
use Illuminate\Http\Request;

class RegistrationNotificationController extends Controller
{
    public function store(RegistraionNotificationRequest $request)
    {
         RegistrationNotification::create($request->validated());

        return redirect('/')->with('message', 'Ми повідомимо щойно відкриється можливість нових реєстрацій');
    }
}
