<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'mail/receive',
        'noxbot/data/json/*',
        'noxbot/data/*',
        '/profile/update_state',
        '/gouliram/*'
    ];
}
