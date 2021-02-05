<?php

namespace App\Http\Controllers;

use App\Mail\RequestApproveMail;
use App\Mail\RequestDisproveMail;
use App\Mail\UserRegistrationDisproveMail;
use App\Mail\UserRegistrationProveMail;
use App\Models\Request;
use App\Models\User;
use App\Models\UserRegistration;
use App\Services\RequestMailService;
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


    public function request(Request $request)
    {
        return view('admin/request')->with('request', $request)->with('title', 'Адмінка');
    }

    public function requests()
    {
        $requests = Request::with(['violationType', 'violationSphere', 'user', 'territory'])
            ->paginate(32);
        return view('admin/requests')->with('requests', $requests)->with('title', 'Адмінка');
    }

    public function requestsApprove()
    {
        $requests = Request::with(['violationType', 'violationSphere', 'user', 'territory'])
            ->where('status', 0)
            ->paginate(32);
        return view('admin/requests-approve')->with('requests', $requests)->with('title', 'Адмінка');
    }


    public function requestApprove(Request $request, RequestMailService $requestMailService)
    {
        $request->status = 1;
        $request->save();

        Mail::to($request->user->email)->send(new RequestApproveMail($request));
        $requestMailService->created($request);
        return redirect('/admin/requests/approve')->with('message', 'Успішно схвалено');
    }

    public function requestDisprove(Request $request)
    {
        $request->status = 2;
        $request->save();
        Mail::to($request->user->email)->send(new RequestDisproveMail());
        return redirect('/admin/requests/approve')->with('message', 'Успішно заперечино');
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
