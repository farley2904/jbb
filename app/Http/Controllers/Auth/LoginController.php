<?php

namespace Jbb\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;

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

    // use AuthenticatesUsers;

    use AuthenticatesUsers {
    logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view(env('THEME').'.login');
    }

    public function username()
    {
        return 'login';
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);

        return redirect()->route('login');
    }
}
