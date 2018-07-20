<?php

namespace App\Http\Controllers;

class SpecificationController extends Controller {
  /**
   * @param CreateSpecificationRequest $objRequest
   */
  public function create(CreateSpecificationRequest $objRequest) {
    return view('specifications.create');
  }

  /**
   * @param DeleteSpecificationRequest $objRequest
   * @param Specification $objSpecification
   */
  public function delete(DeleteSpecificationRequest $objRequest, Specification $objSpecification) {
    return redirect()
      ->back()
      ->with($objSpecification->delete() ? [
        'stringSuccess' => 'Specification succesvol verwijderd!',
      ] : [
        'stringError' => 'Specification onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditSpecificationRequest $objRequest
   * @param Specification $objSpecification
   */
  public function edit(EditSpecificationRequest $objRequest, Specification $objSpecification) {
    return view('specifications.edit');
  }

  public function index() {
    return view('specifications.index');
  }

  /**
   * @param ShowSpecificationRequest $objRequest
   * @param Specification $objSpecification
   */
  public function show(ShowSpecificationRequest $objRequest, Specification $objSpecification) {
    return view('specifications.show');
  }

  /**
   * @param StoreSpecificationRequest $objRequest
   */
  public function store(StoreSpecificationRequest $objRequest) {
    return redirect()
      ->back()
      ->with(Specification::create($objRequest->all()) ? [
        'stringSuccess' => 'Specification succesvol aangemaakt!',
      ] : [
        'stringError' => 'Specificatie onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateSpecificationRequest $objRequest
   * @param Specification $objSpecification
   */
  public function update(UpdateSpecificationRequest $objRequest, Specification $objSpecification) {
    return redirect()
      ->back()
      ->with($objSpecification->update($objRequest->all()) ? [
        'stringSuccess' => 'Specification succesvol aangepast!',
      ] : [
        'stringError' => 'Specification onsuccesvol aangepast!',
      ]);
  }
}
