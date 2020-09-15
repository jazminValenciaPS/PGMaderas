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

mix.styles([
    'resources/assets/plantilla/css/general.css',
    'resources/assets/plantilla/css/materialize.css',
    'resources/assets/plantilla/css/materialize.min.css',
],'public/css/plantilla.css')
.scripts([
    'resources/assets/plantilla/js/materialize.js',
    'resources/assets/plantilla/js/materialize.min.js'
], 'public/js/plantilla.js')
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').version();
