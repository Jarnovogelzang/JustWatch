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

mix.browserSync(process.env.MIX_BROWSER_SYNC_URL)
  .options({
    extractVueStyles: false,
    processCssUrls: true,
    purifyCss: true
  })
  .js('resources/assets/js/app.js', 'public/js')
  .extract([
    'jquery',
    'laravel-echo',
    'toastr',
    'pusher-js'
  ])
  .scripts([
    'public/js/app.js',
    'resources/assets/js/ajax.js'
  ], 'public/js/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/orders/logic.js',
  ], 'public/js/orders/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/custom/discountcodes/logic.js',
  ], 'public/js/discountcodes/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/custom/priceranges/logic.js',
  ], 'public/js/priceranges/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/custom/products/logic.js',
  ], 'public/js/products/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/custom/users/logic.js',
  ], 'public/js/users/logic.js')
  .scripts([
    'public/js/app.js',
    'resources/assets/js/custom/categories/logic.js',
  ], 'public/js/categories/logic.js')
  .sass('resources/assets/sass/app.scss', 'public/css');

if (mix.inProduction()) {
  mix.version();
}
