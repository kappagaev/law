<?php


namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Services\AzureService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
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
     * @return \Illuminate\Http\JsonResponse
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
            $token = JWTAuth::fromUser(auth()->user());
            return $this->respondWithToken($token);
        }
        $registration = $azureService->getRegistration($userData);

        return response()->json(['registration' => $registration->key]);

    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
