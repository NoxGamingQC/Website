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

mix.js('resources/assets/js/app.js', 'public/js');
mix.copy('node_modules/Font-Awesome/fonts', 'public/fonts');
mix.sass('resources/assets/sass/themes/darkTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/draculaTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/lightTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/grayscaleTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/halloweenTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/unicornTheme.scss', 'public/css');
mix.sass('resources/assets/sass/themes/christmasTheme.scss', 'public/css');
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.less('resources/assets/sass/bootstrap.less', 'public/css');
