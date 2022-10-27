<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App;

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

    use AuthenticatesUsers {
        redirectPath as laravelRedirectPath;
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
    }

    public function redirectPath()
    {
        // Do your logic to flash data to session...
        session()->flash('alert', ['info' => ['title' => 'Welcome back', 'text' => 'asdf']]);

        // Return the results of the method we are overriding that we aliased.
        return $this->laravelRedirectPath();
    }

    public function showLoginForm()
    {
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');    
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->back()->with([
            'alert' => ['success', [
                'title' => "Log out",
                'text' => "You logged out successfully"
            ]]
        ]); ;
    }
}
