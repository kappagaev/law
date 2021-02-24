<?php

namespace App\Http\Controllers;

use App\Services\AzureService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function create(Request $request)
    {
        return view('user/login')->with('title', 'Логін');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('/')->with(Auth::user()->name . ', вітаємо!');
        }
        return redirect()->back()->with('message', 'Пароль або пошта неправильні');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the o365 authentication page.
     *
     * References to env('GRAPH_TENANT_ID') can be changed to
     * config('services.graph.tenant_id') which bypasses the Laravel
     * config cache.
     *
     * See https://github.com/SocialiteProviders/Providers/issues/337
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('azure')->redirect();
    }

    /**
     * Obtain the user information from o365.
     *
     * @param AzureService $azureService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback(AzureService $azureService)
    {

        $user = Socialite::driver('azure')->stateless()
            ->user();
        $userData = [
            'email' => $user->email,
            'socialite_id' => $user->id
        ];
        $credentials = array_merge($userData, [
            'password' => env('AZURE_DEFAULT_PASSWORD')
        ]);
        if (auth()->attempt($credentials)) {
            return redirect('/')->with(Auth::user()->name . ', вітаємо!');
        }
        $registration = $azureService->getRegistration($userData);

        return redirect('/registration/office365/' . $registration->key);

    }

}
