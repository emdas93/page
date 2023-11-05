const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/board/index.js', 'public/js/board/index.js')
    .js('resources/js/moon/index.js', 'public/js/moon/index.js')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/moon/index.css', 'public/css/moon/index.css')
    ;
