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

Auth::routes();