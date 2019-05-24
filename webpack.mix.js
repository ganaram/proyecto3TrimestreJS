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
   .js('resources/js/create.js','public/js')
   .js('resources/js/edit.js','public/js')
   .js('resources/js/delete.js','public/js')
   .js('resources/js/validateFinal.js','public/js')
   .babel([
      'resources/js/create.js',
      'resources/js/validateFinal.js'
   ], "public/js/validarYCrear.js")
   .babel([
      'resources/js/edit.js',
      'resources/js/validateFinal.js'
   ], "public/js/validarYEditar.js")
   .sass('resources/sass/app.scss', 'public/css');
