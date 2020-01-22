const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
    .js('node_modules/chart.js/dist/Chart.js', 'public/js/')
    .js('node_modules/perfect-scrollbar/dist/perfect-scrollbar.js', 'public/js/')
    .js('node_modules/jquery/dist/jquery.min.js', 'public/js/')
    .js('node_modules/popper.js/dist/popper.min.js', 'public/js/')
    .js('resources/js/datatables_js.js', 'public/js')
    .sass('resources/sass/datatables_css.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css');