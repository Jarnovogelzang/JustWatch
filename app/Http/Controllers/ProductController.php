<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Requests\Products\EditProductRequest;
use App\Http\Requests\Products\ShowProductRequest;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller {
  /**
   * @param CreateProductRequest $objRequest
   */
  public function create(CreateProductRequest $objRequest) {
    return view('products.create');
  }

  /**
   * @param DeleteProductRequest $objRequest
   * @param Product $objProduct
   */
  public function delete(DeleteProductRequest $objRequest, Product $objProduct) {
    return redirect()
      ->back()
      ->with($objProduct->deleteModel() ? [
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
    return view('products.edit');
  }

  public function index() {
    return view('products.index');
  }

  /**
   * @param ShowProductRequest $objRequest
   * @param Product $objProduct
   */
  public function show(ShowProductRequest $objRequest, Product $objProduct) {
    return view('products.show');
  }

  /**
   * @param StoreProductRequest $objRequest
   */
  public function store(StoreProductRequest $objRequest) {
    $objProduct = Product::createModel($objRequest->all());
    if ($objRequest->input('boolSetDefaultAliData')) {
      $objProduct->setIntAliId($objRequest->input('intAliId'))->setAliDefaultData()->save();
    }

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
    return redirect()
      ->back()
      ->with($objProduct->updateModel($objRequest->all()) ? [
        'stringSuccess' => 'Product succesvol aangepast!',
      ] : [
        'stringError' => 'Product onsuccesvol aangepast!',
      ]);
  }
}
