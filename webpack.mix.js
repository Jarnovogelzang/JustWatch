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

mix.options({
  purifyCss: true,
  processCssUrls: true
})
  .js('resources/assets/js/*.js', 'public/js')
  .js('resources/assets/js/custom/*.js', 'public/js')
  .js('resources/assets/js/custom/categories/*.js', 'public/js/categories')
  .js('resources/assets/js/custom/discountcodes/*.js', 'public/js/discountcodes')
  .js('resources/assets/js/custom/orders/*.js', 'public/js/orders')
  .js('resources/assets/js/custom/priceranges/*.js', 'public/js/priceranges')
  .js('resources/assets/js/custom/products/*.js', 'public/js/products')
  .js('resources/assets/js/custom/users/*.js', 'public/js/users')
  .sass('resources/assets/sass/app.scss', 'public/css');