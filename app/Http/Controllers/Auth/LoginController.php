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

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        if (Auth::attempt($credentials)) {

            return redirect(session()->get('url.intended'));
        }

        $userEmailsList = explode(';', Auth::user()->local_mail);
        if($userEmailsList) {
            $cm = new ClientManager($options = []);
                $emailClient = $cm->make([
                    'host'          => 'www.noxgamingqc.ca',
                    'port'          => 993,
                    'encryption'    => 'ssl',
                    'validate_cert' => true,
                    'username'      => $userEmailsList[0],
                    'password'      => $request->password,
                    'protocol'      => 'imap'
                ]);
            $emailClient->connect();
            Session::put(['email_client' => $emailClient]);
            Session::save();
            Session::regenerate();
        }

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
}