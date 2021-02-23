<<<<<<< HEAD
let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js(['resources/js/app.js'], 'dist/js')
    .sass('resources/sass/app.scss', 'dist/css');

mix.setResourceRoot('../');
//mix.setPublicPath('dist');
=======
let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js(['resources/js/app.js'], 'dist/js')
    .sass('resources/sass/app.scss', 'dist/css');

mix.setResourceRoot('../');
//mix.setPublicPath('dist');
>>>>>>> 6ab5d794940fc6a1e196f6ec040d0de450173200
