<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('auth')->only('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'userName';
    }

    // /**
    //  * Attempt to log the user into the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return bool
    //  */
    // protected function attemptLogin(Request $request)
    // {
    //     // Attempt to log in with the provided credentials.
    //     if ($this->guard()->attempt($this->credentials($request), $request->boolean('remember'))) {
    //         $user = $this->guard()->user(); // Retrieve the authenticated user.

    //         // Check if the authenticated user is active.
    //         if ($user->active) {
    //             return true;
    //         } else {
    //             $this->guard()->logout(); // Logout the user if not active.
    //             redirect()->back()->with('note', 'Your account is inactive!');
    //             return false;
    //         }
    //     }
    // }
}
