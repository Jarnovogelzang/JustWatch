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
    Log::info('Creating a new PriceRange.');

    return view('priceranges.create');
  }

  /**
   * @param DeletePriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function delete(DeletePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    Log::critical('Deleting a PriceRange with ID as ' . $objPriceRange->getIntId() . '.');

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
    Log::info('Editing a PriceRange with ID as ' . $objPriceRange->getIntId() . '.');

    return view('priceranges.edit')
      ->with([
        'objPriceRange' => $objPriceRange,
      ]);
  }

  public function index() {
    Log::info('Showing all the PriceRanges.');

    return view('priceranges.index')
      ->with([
        'arrayPriceRanges' => PriceRange::all(),
      ]);
  }

  /**
   * @param ShowPriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function show(ShowPriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    Log::info('Showing a PriceRange with ID as ' . $objPriceRange->getIntId() . '.');

    return view('priceranges.show')
      ->with([
        'objPriceRange' => $objPriceRange,
      ]);
  }

  /**
   * @param StorePriceRangeRequest $objRequest
   */
  public function store(StorePriceRangeRequest $objRequest) {
    Log::info('Storing a new PriceRange.');

    $objPriceRange = PriceRange::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Prijsinterval succesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdatePriceRangeRequest $objRequest
   * @param PriceRange $objPriceRange
   */
  public function update(UpdatePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    Log::info('Updating a PriceRange with ID as ' . $objPriceRange->getIntId() . '.');

    $objPriceRange = $objPriceRange->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Prijsinterval succesvol aangepast!',
        'objPriceRange' => $objPriceRange,
      ]);
  }
}
