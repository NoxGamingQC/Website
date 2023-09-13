<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class Development
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $isDev = false;
        if(env('APP_URL') !== env('APP_SERVER_URL')) {
            \URL::forceScheme('https');
        } else {
            $isDev = true;
        }
        if (Auth::check()) {
            if(Auth::user()->isAdmin || Auth::user()->isModerator || Auth::user()->isDev) {
                $isDev = true;
            }
        }
        if (env('APP_ENV') !== 'production' && $isDev == false) {
            return redirect('/'. app()->getLocale() . '/maintenance');
        }
        return $next($request);
    }
}
