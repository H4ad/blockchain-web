const { mix } = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('vendor/twbs/bootstrap', 'public/twbs/bootstrap');
mix.copy('vendor/components/jquery', 'public/components/jquery');
mix.copy('vendor/gymadarasz/jquery.easing', 'public/gymadarasz/jquery.easing');
mix.copy('vendor/dimsemenov/magnific-popup', 'public/dimsemenov/magnific-popup/dist');
mix.copy('vendor/fortawesome/font-awesome', 'public/fortawesome/font-awesome');