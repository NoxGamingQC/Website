<?php
  
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Webklex\PHPIMAP\ClientManager;
use Webklex\PHPIMAP\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Builder;

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
        $this->redirectTo = '/' . app()->getLocale() . '/home';
    }

    public function showLoginForm()
    {  
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return view("pages.auth.login")->with([
            'header' => false,
            'currentPage' => 'login',
            'previousPath' => url()->previousPath()
        ]);
    }  

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');
        
        Session::put('email_client_password', $request->password);
        Session::save();
        $previousPath = explode('/', $request->previousPath);
        unset($previousPath[0]);
        unset($previousPath[1]);

        if (Auth::attempt([
            'email' => $request->name,
            'password' => $request->password,
        ])) {
            return response()->json([
                'redirectTo' => '/' . Auth::user()->preferred_language . '/' . implode('/', $previousPath)
            ]);
        }

        if (Auth::attempt([
            'name' => $request->name,
            'password' => $request->password,
        ])) {
            return response()->json([
                'redirectTo' => '/' . Auth::user()->preferred_language . '/' . implode('/', $previousPath)
            ]);
        }

        abort(403, 'invalid-credentials');
    }

    /**
    * Log the user out of the application.
    */
    public function logout(Request $request): RedirectResponse
    {
        $locale = app()->getLocale();

        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/' . $locale . '/home');
    }
}