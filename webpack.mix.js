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
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js('resources/assets/js/record.js', 'public/resources/js/app.record.js');

   mix.scripts([
      'node_modules/vue/dist/vue.js',
      'node_modules/vue-resource/dist/vue-resource.min.js',
      'node_modules/jquery/dist/jquery.min.js',
      'node_modules/bootstrap/dist/js/bootstrap.min.js',
   ],'public/resources/js/vendor.js');

   mix.styles([
   'node_modules/bootstrap/dist/css/bootstrap.min.css',
   'node_modules/font-awesome/css/font-awesome.min.css',
],'public/resources/css/vendor.css');

mix.copyDirectory('node_modules/font-awesome/fonts','public/resources/fonts');
