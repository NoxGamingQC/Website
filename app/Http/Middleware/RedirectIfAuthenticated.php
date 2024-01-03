<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(env('APP_URL') !== 'http://127.0.0.1') {
            \URL::forceScheme('https');
        }
        if (Auth::guard($guard)->check()) {
            if(redirect()->intended()) {
                return redirect()->intended();
            } else {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
