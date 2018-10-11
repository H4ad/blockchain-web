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

mix.sass('resources/assets/sass/select.scss', 'public/css');
mix.sass('resources/assets/sass/prettifycode.scss', 'public/css');
/**
 * Scripts do Management
 */

/**
 * Home
 */
mix.js('resources/assets/js/views/management/home/loadDailyCharts.js', 'public/js/views/management/home/');
mix.js('resources/assets/js/views/management/home/loadUserSubscriptionsChart.js', 'public/js/views/management/home/');
mix.js('resources/assets/js/views/management/home/loadStockInformationChart.js', 'public/js/views/management/home/');

/**
 * Blockchain
 */

mix.js('resources/assets/js/views/management/blockchain/getAlunoInfo.js', 'public/js/views/management/blockchain/');
mix.js('resources/assets/js/views/management/blockchain/getTransactions.js', 'public/js/views/management/blockchain/');
mix.sass('resources/assets/sass/progressbar.scss', 'public/css');

/*
 * Traduções
 */

mix.js('resources/assets/js/localization/bootstrap-table-en-US.js', 'public/js/localization/');
mix.js('resources/assets/js/localization/bootstrap-table-pt-BR.js', 'public/js/localization/');