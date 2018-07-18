<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::middleware(['auth:admin'])->group(function () {
  Route::resources([
    'User' => 'UserController',
    'Order' => 'OrderController',
    'Product' => 'ProductController',
    'PriceRange' => 'PriceRangeController',
    'Category' => 'CategoryController',
  ], [
    'User' => 'objUser',
    'Order' => 'objOrder',
    'Product' => 'objProduct',
    'PriceRange' => 'objPriceRange',
    'Category' => 'objCategory',
  ]);
});

Route::get('/test', function () {
  return view('products.show');
});

Route::get('/', 'ProductController@index');
Auth::routes();