<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verify(Request $request, $id)
    {
        // $user = $request->user();
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
        return redirect($this->redirectPath())->with('warning', 'Your email was already verified.');
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            $user->email_confirmed = 1;
            $user->save();

            event(new Verified($user));
        }

        // return redirect($this->redirectPath())->with('verified', true);

        return redirect('/login')->with('success', 'Your email has been verified.');
    }
}
