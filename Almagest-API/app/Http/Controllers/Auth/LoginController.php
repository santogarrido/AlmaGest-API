<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

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

    protected function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return redirect()->route('login')->withErrors([
                'email' => 'El usuario no existe en nuestra base de datos.'
            ]);
        }


        if ($user->email_confirmed == 0) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'No puedes iniciar sesión porque tu email no está verificado.'
            ]);
        }

        if ($user->activated == 0) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'No puedes iniciar sesión porque la cuenta no está activada.'
            ]);
        }


        if ($user->deleted == 1) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'La cuenta está eliminada'
            ]);
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->route('login')->withErrors([
                'password' => 'La contraseña es incorrecta'
            ]);
        }

        if ($user->type === 'A') {
            return redirect('/admin');
        }

        return redirect('/home');

    }

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
        $this->middleware('auth')->only('logout');
    }
}
