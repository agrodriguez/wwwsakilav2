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

elixir(function(mix) {
    mix.sass('app.scss', 'resources/assets/css');

    mix.styles([
    	'libs/bootstrap.min.css',    	
    	'app.css',
        'libs/ie10-viewport-bug-workaround.css',
    	'libs/select2.min.css',
        'libs/bootstrap-datetimepicker.min.css',
        'libs/css.css',
        'libs/font-awesome.min.css'
    ]);
	
    mix.scripts([
    	'libs/jquery.min.js',
        'libs/moment-with-locales.min.js',
        'libs/bootstrap.min.js',
        'libs/ie10-viewport-bug-workaround.js',
        'libs/select2.min.js',
        'libs/bootstrap-datetimepicker.min.js',        
        'libs/map.js'
    ]);
    mix.version(['public/css/all.css','public/js/all.js']);
    //'libs/maps.api.js',
});
