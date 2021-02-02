<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Redirect;

class HttpsProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() && App::environment() === 'production') {
            return redirect()->secure($request->getRequestUri(), 301, ['X-Forwarded-Proto'=> [true]]);
        }

        return $next($request); 
    }
}