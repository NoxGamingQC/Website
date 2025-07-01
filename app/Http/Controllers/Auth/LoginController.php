<?php
  
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;
use Illuminate\Support\Facades\Session;

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
        $this->redirectTo = url()->previous();
    }

    public function showLoginForm()
    {  
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view("auth.login")->with([
            'header' => false,
        ]);
    }  

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        Session::put('email_client_password', $request->password);
        Session::save();

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        if (Auth::attempt($credentials)) {
            return redirect(session()->get('url.intended'));
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
}