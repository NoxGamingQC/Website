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
        /*if (env('APP_ENV') !== 'production' && !Auth::check()) {
            return redirect('welcome_dev');
        }*/
        return $next($request);
    }
}
