<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
        if(env('APP_URL') !== 'http://127.0.0.1') {
            \URL::forceScheme('https');
        }
        app()->setLocale($request->segment(1));
        return $next($request);
    }
}
