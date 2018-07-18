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
/*
browserSync(process.env.MIX_BROWSER_SYNC_URL)
  .options({
    extractVueStyles: false,
    processCssUrls: true,
    purifyCss: true
  })
  */
mix.options({
  purifyCss: true,
  processCssUrls: true
})
  .js('resources/assets/js/custom/register.js', 'public/js')
  .js('resources/assets/js/custom/orders/logic.js', 'public/js/orders')
  .js('resources/assets/js/custom/discountcodes/logic.js', 'public/js/discountcodes')
  .js('resources/assets/js/custom/products/logic.js', 'public/js/products')
  .js('resources/assets/js/custom/categories/logic.js', 'public/js/categories')
  .js('resources/assets/js/custom/priceranges/logic.js', 'public/js/priceranges')
  .js('resources/assets/js/custom/users/logic.js', 'public/js/users')
  .sass('resources/assets/sass/app.scss', 'public/css');
