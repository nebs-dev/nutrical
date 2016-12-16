const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

 elixir((mix) => {
    mix.sass('app.scss', './public/css/backend')

    // Frontend Landing
    .styles([
        'frontend/landing/bootstrap.min.css',
        'frontend/landing/magnific-popup.css',
        'frontend/landing/creative.min.css',
        ], './public/css/frontend/landing.css')

    .scripts([
        'frontend/landing/jquery.min.js',
        'frontend/landing/bootstrap.min.js',
        'frontend/landing/jquery.easing.min.js',
        'frontend/landing/scrollreveal.min.js',
        'frontend/landing/jquery.magnific-popup.min.js',
        'frontend/landing/creative.min.js'
        ], './public/js/frontend/landing.js')

    // Frontend Calculator
    .styles([
        'backend/libs/*.css'
        ], './public/css/frontend/cal/libs.css')

    .scripts([
        'frontend/cal/libs/*.js'
        ], './public/js/frontend/cal/libs.js')


    // Backend
    .scripts([
        'theme/jquery.min.js',
        'theme/bootstrap.min.js',
        'theme/jquery.dataTables.min.js',
        'theme/dataTables.bootstrap.min.js',
        'theme/icheck.min.js',
        'theme/*.js',
        'theme/custom.min.js'
        ], './public/js/theme.js')

    .scripts([
        'backend/libs/*.js'
        ], './public/js/backend/libs.js')

    .styles([
        'theme/*.css'
        ], './public/css/theme.css')

    .styles([
        'backend/libs/*.css'
        ], './public/css/backend/libs.css')

    .styles([
        'fonts/*.css'
        ], './public/css/font-awesome/font-awesome.css')
})
 ;
