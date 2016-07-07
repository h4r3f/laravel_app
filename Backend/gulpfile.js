var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.css.folder = '/';
elixir.config.js.folder  = '/';

elixir(function(mix) {
    mix.sass('app.scss')
    .styles([
        'bower/admin-lte/bootstrap/css/bootstrap.min.css',
        'bower/font-awesome-css/css/font-awesome.min.css',
        'bower/ionicons/css/ionicons.min.css',
        'bower/admin-lte/dist/css/AdminLTE.min.css',
        'bower/admin-lte/dist/css/skins/skin-blue.min.css'
    ], './public/css/libs.css')
    .scripts([
        'bower/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js',
        'bower/admin-lte/bootstrap/js/bootstrap.min.js',
        'bower/admin-lte/plugins/fastclick/fastclick.min.js',
        'bower/admin-lte/dist/js/app.min.js',
    ], './public/js/libs.js')
    .copy('resources/assets/bower/font-awesome-css/fonts', 'public/fonts')
    .copy('resources/assets/fonts', 'public/fonts')
    .copy('resources/assets/images', 'public/images')
    .copy('resources/assets/bower/admin-lte/bootstrap/fonts', 'public/fonts');
});
