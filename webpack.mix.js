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

mix.js([
    'resources/js/app.js',
    'public/js/front.js',
], 'public/js/secan_plugins.js')
    .js([
        'resources/js/app.js',
    ], 'public/js/cms.js')
    .styles([
        'public/vendor/bootstrap/css/bootstrap.css',
        'public/css/style.default.css',
        'public/css/custom.css',
        'public/css/maps.css',
    ], 'public/css/secan_plugins.css')
    .styles([
        'public/css/app.css',
    ], 'public/css/cms.css')
    .options({
        processCssUrls: false
    });;
