<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

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
        if(!$request->user()) {
            App::setLocale($request->segment(1));
            Session::put('locale', $request->segment(1));
            return $next($request);
        }
 
        $language = $request->user()->preferred_language;
 
        if (isset($language)) {
            app()->setLocale($language);
        }
 
        return $next($request);
    }
}
