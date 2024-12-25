<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],

    // explicitly tell which origins needs access to the resource
    'allowed_origins' => ['*'],

    // or use regex pattern, helpful if you want to grant
    // access to origins with certain pattern (i.e. an origin under a subdomain etc.)
    'allowed_origins_patterns' => ['*'],

    // no changes made below
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,

];
