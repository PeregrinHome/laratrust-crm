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
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.min.css',
    './node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
    'node_modules/alertifyjs/build/css/alertify.min.css',
    'node_modules/alertifyjs/build/css/themes/bootstrap.min.css',
    ], 'public/css/all.css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
        'node_modules/popper.js/dist/umd/popper.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
        'node_modules/alertifyjs/build/alertify.min.js',

        'resources/assets/js/first/ajaxSetup.js',

        'resources/assets/js/default/datepicker.js',
    ], 'public/js/all.js')
    .js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
