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

mix.js('resources/assets/js/bootstrap.js', 'public/js');

mix.js('node_modules/magnific-popup/dist/jquery.magnific-popup.js', 'public/js').
	sass('node_modules/magnific-popup/src/css/main.scss', 'public/css');
mix.js('node_modules/magnific-popup/dist/jquery.magnific-popup.min.js', 'public/js');

/**
 * Scripts do Management
 */

/**
 * Home
 */
mix.js('resources/assets/js/views/management/home/loadDailyCharts.js', 'public/js/views/management/home/');
mix.js('resources/assets/js/views/management/home/loadUserSubscriptionsChart.js', 'public/js/views/management/home/');
mix.js('resources/assets/js/views/management/home/loadStockInformationChart.js', 'public/js/views/management/home/');