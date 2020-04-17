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

mix.react('resources/assets/js/app.js', 'public/js')
   .copy('node_modules/font-awesome/fonts', 'public/fonts')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/appDracula.scss', 'public/css')
   .sass('resources/assets/sass/appLight.scss', 'public/css');
