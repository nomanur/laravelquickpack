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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    
    'resources/assets/css/libs/all.min.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/owl.carousel.css',
    'resources/assets/css/libs/loginform.css',

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.min.js',
    'resources/assets/js/libs/jquery.easing.min.js',
    'resources/assets/js/libs/sb-admin-2.min.js',
    'resources/assets/js/libs/Chart.min.js',
    'resources/assets/js/libs/owl.carousel.min.js',
 
], 'public/js/libs.js');