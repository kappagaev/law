<?php

namespace App\Http\Controllers;

use App\Http\Requests\AzureRegistrationConfirmRequest;
use App\Models\AzureRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AzureRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function confirmForm(AzureRegistration $registration)
    {

        return view('azure-registration/confirm')->with('registration', $registration)->with("fakeLogin", true)->with('title', 'Додайте інформацію');
    }

    public function confirm(AzureRegistrationConfirmRequest $request, AzureRegistration $registration)
    {
        $user = new User($request->validated());
        $user->password = Hash::make(env('AZURE_DEFAULT_PASSWORD'));
        $user->fill($registration->getUserAttributes())->save();
        $registration->delete();
        return redirect('/auth/office365/redirect')->with('message', 'Успішно зареєстровано');
    }
}
