<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Requests\Categories\EditCategoryRequest;
use App\Http\Requests\Categories\ShowCategoryRequest;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller {
  /**
   * @param CreateCategoryRequest $objRequest
   */
  public function create(CreateCategoryRequest $objRequest) {
    return view('categories.create');
  }

  /**
   * @param DeleteCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function delete(DeleteCategoryRequest $objRequest, Category $objCategory) {
    return redirect()
      ->back()
      ->with($objCategory->delete() ? [
        'stringSuccess' => 'Categorie succesvol verwijderd!',
      ] : [
        'stringError' => 'Categorie onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function edit(EditCategoryRequest $objRequest, Category $objCategory) {
    return view('categories.edit');
  }

  public function index() {
    return view('categories.index');
  }

  /**
   * @param ShowCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function show(ShowCategoryRequest $objRequest, Category $objCategory) {
    return view('categories.show');
  }

  /**
   * @param StoreCategoryRequest $objRequest
   */
  public function store(StoreCategoryRequest $objRequest) {
    return redirect()
      ->back()
      ->with(Category::create($objRequest->all()) ? [
        'stringSuccess' => 'Categorie succesvol aangemaakt!',
      ] : [
        'stringError' => 'Categorie onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function update(UpdateCategoryRequest $objRequest, Category $objCategory) {
    return redirect()
      ->back()
      ->with($objCategory->update($objRequest->all()) ? [
        'stringSuccess' => 'Categorie succesvol aangepast!',
      ] : [
        'stringError' => 'Categorie onsuccesvol aangepast!',
      ]);
  }
}
