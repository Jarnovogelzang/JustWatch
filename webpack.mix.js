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

var arrayScripts = [
  'orders/',
  'discountcodes/',
  'priceranges/',
  'products/',
  'categories/',
  'users/'
];

mix.browserSync(process.env.MIX_BROWSER_SYNC_URL)
  .options({
    extractVueStyles: false,
    processCssUrls: true,
    purifyCss: true
  })
  .js('resources/assets/js/app.js', 'public/js')
  .js('resources/assets/js/custom/ajax.js', 'public/js/')
  .extract([
    'jquery',
    'laravel-echo',
    'toastr',
    'pusher-js'
  ])
  .scripts([
    'public/js/app.js',
    'public/js/ajax.js'
  ], 'public/js/logic.js')
  .sass('resources/assets/sass/app.scss', 'public/css');

for (var intCounter = 0; intCounter < arrayScripts.length; intCounter++) {
  mix.scripts([
    'public/js/logic.js',
    'resources/assets/js/custom' + arrayScripts[intCounter]
  ], 'public/js' + arrayScripts[intCounter]);
}

if (mix.inProduction()) {
  mix.version();
}
