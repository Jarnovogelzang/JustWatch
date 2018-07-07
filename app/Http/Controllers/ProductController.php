<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\DeleteProductRequest;
use App\Http\Requests\Products\EditProductRequest;
use App\Http\Requests\Products\ShowProductRequest;
use App\Http\Requests\Products\StoreProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;

class ProductController extends Controller {
  public function index() {
    return view('products.index')
      ->with([
        'arrayproducts' => Product::all(),
      ]);
  }

  public function show(ShowProductRequest $objRequest, Product $objProduct) {
    return view('products.show')
      ->with([
        'objProduct' => $objProduct,
      ]);
  }

  public function create(CreateProductRequest $objRequest) {
    return view('products.create');
  }

  public function edit(EditProductRequest $objRequest, Product $objProduct) {
    return view('products.edit')
      ->with([
        'objProduct' => $objProduct,
      ]);
  }

  public function update(UpdateProductRequest $objRequest, Product $objProduct) {
    $objProduct = $objProduct->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Product succesvol aangepast!',
        'objProduct' => $objProduct,
      ]);
  }

  public function store(StoreProductRequest $objRequest) {
    $objProduct = Product::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Product succesvol aangemaakt!',
      ]);
  }

  public function delete(DeleteProductRequest $objRequest, Product $objProduct) {
    $objProduct->delete();

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Product succesvol verwijderd!',
      ]);
  }
}
