const elixir = require('laravel-elixir');
require('laravel-elixir-vue');

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

elixir(mix => {
	mix.scripts([
		'libs/jquery.js',
		'libs/bootstrap.js',
		'libs/dropzone.js',
		'libs/jquery.lightbox.js',
		'libs/sweetalert.js',
		'pages/show.js'
	]);
	mix.styles([
		'basic.css',
		'bootstrap.css',
		'dropzone.css',
		'jquery.lightbox.css',
		'sweetalert.css',
		'font-awesome.css',
	]);
	mix.sass(['app.scss']);
	mix.webpack('app.js');
});
