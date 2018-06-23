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
    // .combine([
    //     'resources/assets/assets/lib/select2/js/select2.min.js',
    //     'resources/assets/assets/lib/jquery.bxslider/jquery.bxslider.min.js',
    //     'resources/assets/assets/lib/owl.carousel/owl.carousel.min.js',
    //     'resources/assets/assets/lib/jquery.countdown/jquery.countdown.min.js',
    //     'resources/assets/assets/lib/countdown/jquery.plugin.js',
    //     'resources/assets/assets/lib/countdown/jquery.countdown.js',
    //     'resources/assets/assets/js/jquery.actual.min.js',
    //     'resources/assets/assets/js/theme-script.js',
    //     'public/assets/js/main.js',
    //     'public/js/cart.js'
    //     ], 'public/js/all.js')
   .sass('resources/assets/sass/app.scss', 'public/css');
