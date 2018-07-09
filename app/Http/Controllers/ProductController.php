<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Requests\Products\EditProductRequest;
use App\Http\Requests\Products\ShowProductRequest;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller {
  /**
   * @param CreateProductRequest $objRequest
   */
  public function create(CreateProductRequest $objRequest) {
    Log::info('Storing a new order.');

    return view('products.create');
  }

  /**
   * @param DeleteProductRequest $objRequest
   * @param Product $objProduct
   */
  public function delete(DeleteProductRequest $objRequest, Product $objProduct) {
    Log::info('Storing a new order.');

    return redirect()
      ->back()
      ->with($objProduct->delete() ? [
        'stringSuccess' => 'Product succesvol verwijderd!',
      ] : [
        'stringError' => 'Product onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditProductRequest $objRequest
   * @param Product $objProduct
   */
  public function edit(EditProductRequest $objRequest, Product $objProduct) {
    Log::info('Storing a new order.');

    return view('products.edit')
      ->with([
        'objProduct' => $objProduct,
      ]);
  }

  public function index() {
    Log::info('Storing a new order.');

    return view('products.index')
      ->with([
        'arrayFeaturedCategories' => Category::whereIsFeatured()->get(),
        'arrayHottestProducts' => Product::orderByOrderAmount()->limit(3)->get(),
        'arrayCategories' => Category::all(),
      ]);
  }

  /**
   * @param ShowProductRequest $objRequest
   * @param Product $objProduct
   */
  public function show(ShowProductRequest $objRequest, Product $objProduct) {
    Log::info('Storing a new order.');

    return view('products.show')
      ->with([
        'objProduct' => $objProduct,
      ]);
  }

  /**
   * @param StoreProductRequest $objRequest
   */
  public function store(StoreProductRequest $objRequest) {
    Log::info('Storing a new order.');

    $objProduct = Product::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Product succesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateProductRequest $objRequest
   * @param Product $objProduct
   */
  public function update(UpdateProductRequest $objRequest, Product $objProduct) {
    Log::info('Storing a new order.');

    $objProduct = $objProduct->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Product succesvol aangepast!',
        'objProduct' => $objProduct,
      ]);
  }
}
