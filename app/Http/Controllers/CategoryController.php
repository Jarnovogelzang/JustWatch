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
    Log::info('Storing a new order.');

    return view('categories.create');
  }

  /**
   * @param DeleteCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function delete(DeleteCategoryRequest $objRequest, Category $objCategory) {
    Log::info('Storing a new order.');

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
    Log::info('Storing a new order.');

    return view('categories.edit')
      ->with([
        'objCategory' => $objCategory,
      ]);
  }

  public function index() {
    Log::info('Storing a new order.');

    return view('categories.index')
      ->with([
        'arrayCategorys' => Category::all(),
      ]);
  }

  /**
   * @param ShowCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function show(ShowCategoryRequest $objRequest, Category $objCategory) {
    Log::info('Storing a new order.');

    return view('categories.show')
      ->with([
        'objCategory' => $objCategory,
        'arrayProducts' => $objCategory->getProducts()->paginate(9),
      ]);
  }

  /**
   * @param StoreCategoryRequest $objRequest
   */
  public function store(StoreCategoryRequest $objRequest) {
    Log::info('Storing a new order.');

    $objCategory = Category::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Categorie succesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function update(UpdateCategoryRequest $objRequest, Category $objCategory) {
    Log::info('Storing a new order.');

    $objCategory = $objCategory->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Categorie succesvol aangepast!',
        'objCategory' => $objCategory,
      ]);
  }
}
