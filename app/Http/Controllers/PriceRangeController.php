<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRanges\CreatePriceRangeRequest;
use App\Http\Requests\PriceRanges\DeletePriceRangeRequest;
use App\Http\Requests\PriceRanges\EditPriceRangeRequest;
use App\Http\Requests\PriceRanges\ShowPriceRangeRequest;
use App\Http\Requests\PriceRanges\StorePriceRangeRequest;
use App\Http\Requests\PriceRanges\UpdatePriceRangeRequest;

class PriceRangeController extends Controller {
  public function index() {
    return view('priceranges.index')
      ->with([
        'arrayPriceRanges' => PriceRange::all(),
      ]);
  }

  public function show(ShowPriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return view('priceranges.show')
      ->with([
        'objPriceRange' => $objPriceRange,
      ]);
  }

  public function create(CreatePriceRangeRequest $objRequest) {
    return view('priceranges.create');
  }

  public function edit(EditPriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    return view('priceranges.edit')
      ->with([
        'objPriceRange' => $objPriceRange,
      ]);
  }

  public function update(UpdatePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    $objPriceRange = $objPriceRange->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Prijsinterval succesvol aangepast!',
        'objPriceRange' => $objPriceRange,
      ]);
  }

  public function store(StorePriceRangeRequest $objRequest) {
    $objPriceRange = PriceRange::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Prijsinterval succesvol aangemaakt!',
      ]);
  }

  public function delete(DeletePriceRangeRequest $objRequest, PriceRange $objPriceRange) {
    $objPriceRange->delete();

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Prijsinterval succesvol verwijderd!',
      ]);
  }
}
