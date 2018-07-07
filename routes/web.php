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

Route::middleware(['auth:basic'])->group(function () {
  Route::resource('users', 'UserController')->only(['show', 'update', 'edit']);
  Route::resource('orders', 'OrderController')->only(['show']);

  Route::middleware(['auth:admin'])->group(function () {
    Route::resource([
      'orders' => 'OrderController',
      'users' => 'UserController',
    ])->only([
      'delete',
    ]);

    Route::resource([
      'categories' => 'CategoryController',
      'priceranges' => 'PriceRangeController',
      'products' => 'ProductController',
    ])->only([
      'create',
      'edit',
      'update',
      'store',
    ]);

    Route::resource('orders', 'OrderController')->only(['update', 'edit']);
    Route::resource('priceranges', 'PriceRangeController')->only(['show']);
  });
});

Route::resource([
  'orders' => 'OrderController',
  'users' => 'UserController',
])->only([
  'create',
]);

Route::resource([
  'categories' => 'CategoryController',
  'products' => 'ProductController',
])->only([
  'show',
]);

Route::get('/', 'PagesController@index');
Route::get('/checkout', 'PagesController@checkout');

Auth::routes();