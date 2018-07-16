<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscountCodeController extends Controller {
  /**
   * @param CreateDiscountCodeRequest $objRequest
   */
  public function create(CreateDiscountCodeRequest $objRequest) {
    Log::info('Creating an new DiscountCode.');

    return view('discountcodes.create');
  }

  /**
   * @param DestroyDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function destroy(DestroyDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    Log::critical('Deleting an DiscountCode with ID as ' . $objDiscountCode->getIntId() . '.');

    return redirect()
      ->back()
      ->with($objDiscountCode->delete() ? [
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
    Log::info('Editing an DiscountCode with ID as ' . $objDiscountCode->getIntId() . '.');

    return view('discountcodes.edit');
  }

  public function index() {
    Log::info('Showing all the DiscountCodes.');

    return view('discountcodes.index');
  }

  /**
   * @param ShowDiscountCodeRequest $objRequest
   * @param DiscountCode $objDiscountCode
   */
  public function show(ShowDiscountCodeRequest $objRequest, DiscountCode $objDiscountCode) {
    Log::info('Showing an DiscountCode with ID as ' . $objDiscountCode->getIntId() . '.');

    return view('orders.show');
  }

  /**
   * @param StoreDiscountCodeRequest $objRequest
   */
  public function store(StoreDiscountCodeRequest $objRequest) {
    Log::info('Storing a new DiscountCode.');

    return redirect()
      ->back()
      ->with(Discount::create($objRequest->all()) ? [
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
    Log::info('Updating an DiscountCode with ID as ' . $objDiscountCode->getIntId() . '.');

    return redirect()
      ->back()
      ->with($objDiscountCode->update($objRequest->all()) ? [
        'stringSuccess' => 'KortingsCode succesvol aangepast!',
      ] : [
        'stringError' => 'KortingsCode onsuccesvol aangepast!',
      ]);
  }
}
