<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\URL;

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
        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        if (env('APP_ENV') !== 'production' && !Auth::check()) {
            return redirect('maintenance');
        }
        return $next($request);
    }
}
