<?php

namespace App\Http\Controllers;

use App\Mail\UserRegistrationDisproveMail;
use App\Mail\UserRegistrationProveMail;
use App\Models\Request;
use App\Models\User;
use App\Models\UserRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Admin panel
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View|Response
     */
    public function index()
    {
        $users = User::with('role')
            ->paginate(32);
        return view('admin/panel')->with('users', $users)->with('title', 'Адмінка');
    }


    public function requests()
    {
        $requests = Request::with(['violationType', 'violationSphere', 'user', 'district', 'region', 'settlement'])
            ->paginate(32);
        return view('admin/requests')->with('requests', $requests)->with('title', 'Адмінка');
    }

    public function userRegistrations()
    {
        return view('admin/registrations')->with('registrations', UserRegistration::where('status', 1)->paginate(32));
    }

    public function userRegistration(UserRegistration $registration)
    {
        return view('admin/registration')->with('registration', $registration);
    }

    public function userRegistrationProve(UserRegistration $registration)
    {
        $registration->status = 2;
        $registration->save();

        Mail::to($registration->email)->send(new UserRegistrationProveMail($registration));

        return redirect('/admin/registrations')->with('message', 'Успішно схвалено');
    }

    public function userRegistrationDisprove(UserRegistration $registration)
    {
        $registration->status = 0;
        $registration->save();

        return redirect('/admin/registrations')->with('message', 'Успішно заперечино');
    }

}
