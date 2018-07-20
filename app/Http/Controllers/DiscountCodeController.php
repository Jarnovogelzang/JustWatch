<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountCodeController extends Controller {
  /**
   * @param CreateDiscountCodeRequest $objRequest
   */
  public function create(CreateDiscountCodeRequest $objRequest) {
    return view('discountcodes.create');
  }

  /**
   * @param DestroyDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function destroy(DestroyDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    return redirect()
      ->back()
      ->with($objDiscountCode->deleteModel() ? [
        'stringSuccess' => 'Kortingscode succesvol verwijderd!',
      ] : [
        'stringError' => 'Kortingscode onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function edit(EditDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    return view('discountcodes.edit');
  }

  public function index() {
    return view('discountcodes.index');
  }

  /**
   * @param ShowDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function show(ShowDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    return view('orders.show');
  }

  /**
   * @param StoreDiscountCodeRequest $objRequest
   */
  public function store(StoreDiscountCodeRequest $objRequest) {
    return redirect()
      ->back()
      ->with(Discount::createModel($objRequest->all()) ? [
        'stringSuccess' => 'KortingsCode succesvol aangemaakt!',
      ] : [
        'stringError' => 'KortingsCode onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function update(UpdateDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    return redirect()
      ->back()
      ->with($objDiscountCode->updateModel($objRequest->all()) ? [
        'stringSuccess' => 'KortingsCode succesvol aangepast!',
      ] : [
        'stringError' => 'KortingsCode onsuccesvol aangepast!',
      ]);
  }
}
