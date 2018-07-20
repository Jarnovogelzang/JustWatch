<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRanges\CreatePriceRangeRequest;
use App\Http\Requests\PriceRanges\DeletePriceRangeRequest;
use App\Http\Requests\PriceRanges\EditPriceRangeRequest;
use App\Http\Requests\PriceRanges\ShowPriceRangeRequest;
use App\Http\Requests\PriceRanges\StorePriceRangeRequest;
use App\Http\Requests\PriceRanges\UpdatePriceRangeRequest;

class PriceRangeController extends Controller {
  /**
   * @param CreatePriceRangeRequest $objRequest
   */
  public function create(CreatePriceRangeRequest $objRequest) {
    return view('priceranges.create');
  }

  /**
   * @param DeletePriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function delete(DeletePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return redirect()
      ->back()
      ->with($objPriceRange->delete() ? [
        'stringSuccess' => 'PrijsInterval succesvol verwijderd!',
      ] : [
        'stringError' => 'PrijsInterval onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditPriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function edit(EditPriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return view('priceranges.edit');
  }

  public function index() {
    return view('priceranges.index');
  }

  /**
   * @param ShowPriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function show(ShowPriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return view('priceranges.show');
  }

  /**
   * @param StorePriceRangeRequest $objRequest
   */
  public function store(StorePriceRangeRequest $objRequest) {
    return redirect()
      ->back()
      ->with(PriceRange::create($objRequest->all()) ? [
        'stringSuccess' => 'Prijsinterval succesvol aangemaakt!',
      ] : [
        'stringError' => 'Prijsinteval onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdatePriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function update(UpdatePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return redirect()
      ->back()
      ->with($objPriceRange->update($objRequest->all()) ? [
        'stringSuccess' => 'Prijsinterval succesvol aangepast!',
      ] : [
        'stringError' => 'Prijsinterval onsuccesvol aangepast!',
      ]);
  }
}
