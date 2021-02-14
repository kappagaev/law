<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationConfirmRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Models\User;
use App\Models\UserRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class UserRegistrationController extends Controller
{
    public function create()
    {
        return view('registration/create');
    }

    public function store(UserRegistrationRequest $request)
    {

        $registration = new UserRegistration($request->validated());
        $registration->key = Str::random(40);
        $registration->save();

        return  redirect('/')->with('message', 'Дякуємо, Вашу заявку прийнято. Найближчим часом ми відповімо на зазначену вами адересу електронної пошти.');
    }

    public function confirmForm(UserRegistration $registration)
    {
        return view('registration/confirm')->with('registration', $registration);
    }

    public function confirm(UserRegistrationConfirmRequest $request, UserRegistration $registration)
    {
        $user = new User($request->validated());
        $user->fill($registration->getUserAttributes())->save();

        return redirect('/')->with('message', 'Успішно зареєстровано');
    }


}
