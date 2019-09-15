<?php

namespace HUAC\Http\Controllers\Auth;

use HUAC\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use HUAC\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password'        => 'required|string',
        ]);
    }

    /**
     * @param $driver
     * @return RedirectResponse
     */
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param $driver
     * @return User
     */
    public function handleProviderCallback($driver)
    {
        $oauthUser = Socialite::driver($driver)->stateless()->user();

        $user = User::where('email', $oauthUser->email)->first();

        if ($user === null) {
            $user = User::create([
                'name' => $oauthUser->name,
                'email' => $oauthUser->email,
                'username' => strtolower(str_replace(' ', '_', $oauthUser->name)),
                'password' => Hash::make($oauthUser->name.$oauthUser->email),
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
