var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix

    .scripts([
        'jquery/dist/jquery.min.js',
        // list your other npm packages here
    ],
    'public/js/vendor.js', // 2nd param is the output file
    'node_modules')        // 3rd param is saying "look in /node_modules/ for these scripts"

    .scripts([
        'app.js'       // your custom js file located in default location: /resources/assets/js/
    ], 'public/js/app.js') // looks in default location since there's no 3rd param

    .version([             // optionally append versioning string to filename
        'js/vendor.js',    // compiled files will be in /public/build/js/
        'js/app.js'
    ]);

});