<?php

use App\Models\Product;

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

/**
 * Routing voor de Webshop
 */
Route::get('/', 'ShopController@index');

Route::get('/producten', 'ShopController@products');
Route::get('/producten/{stringProductName}', 'ShopController@product');

Route::get('/collecties', 'ShopController@categories');
Route::get('/collecties/{stringCategoryName}', 'ShopController@category');

Route::get('/winkelmandje', 'ShopController@basket');
Route::get('/betalen', 'ShopController@payout');

/**
 * Routing voor de Adminapplicatie
 */
Route::get('/over', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/home', 'PagesController@index');

Route::middleware(['auth:admin'])->group(function () {
  Route::resource('User', 'UserController', [
    'parameters' => [
      'User' => 'objUser',
    ],
  ]);

  Route::resource('Order', 'OrderController', [
    'parameters' => [
      'Order' => 'objOrder',
    ],
  ]);

  Route::resource('Order', 'OrderController', [
    'parameters' => [
      'Product' => 'objProduct',
    ],
  ]);

  Route::resource('Category', 'CategoryController', [
    'parameters' => [
      'Category' => 'objCategory',
    ],
  ]);

  Route::resource('Tag', 'TagController', [
    'parameters' => [
      'Tag' => 'objTag',
    ],
  ]);

  Route::resource('Specification', 'SpecificationController', [
    'parameters' => [
      'Specification' => 'objSpecification',
    ],
  ]);

  Route::post('/getAjaxData/{objMethodName}', 'AjaxController@{objMethodName}');
});

Auth::routes();