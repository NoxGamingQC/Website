let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/themes/system.scss', 'public/css')
.sass('resources/assets/sass/themes/dark/dark.scss', 'public/css')
.sass('resources/assets/sass/themes/light/light.scss', 'public/css');
//mix.less('resources/assets/sass/bootstrap.less', 'public/css');
