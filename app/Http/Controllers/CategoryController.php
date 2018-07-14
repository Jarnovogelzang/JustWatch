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
    Log::info('Creating a new Category.');

    return view('categories.create');
  }

  /**
   * @param DeleteCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function delete(DeleteCategoryRequest $objRequest, Category $objCategory) {
    Log::critical('Deleting a Category with ID as ' . $objCategory->getIntId() . '.');

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
    Log::info('Editing a Category with ID as ' . $objCategory->getIntId() . '.');

    return view('categories.edit');
  }

  public function index() {
    Log::info('Showing all the Categories.');

    return view('categories.index');
  }

  /**
   * @param ShowCategoryRequest $objRequest
   * @param Category $objCategory
   */
  public function show(ShowCategoryRequest $objRequest, Category $objCategory) {
    Log::info('Showing a Category with ID as ' . $objCategory->getIntId() . '.');

    return view('categories.show');
  }

  /**
   * @param StoreCategoryRequest $objRequest
   */
  public function store(StoreCategoryRequest $objRequest) {
    Log::info('Storing a new Category.');

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
    Log::info('Updating a Category with ID as ' . $objCategory->getIntId() . '.');

    $objCategory = $objCategory->update($objRequest->all());

    return redirect()
      ->back()
      ->with($objCategory->update($objRequest->all()) ? [
        'stringSuccess' => 'Categorie succesvol aangepast!',
      ] : [
        'stringError' => 'Categorie onsuccesvol aangepast!',
      ]);
  }
}
