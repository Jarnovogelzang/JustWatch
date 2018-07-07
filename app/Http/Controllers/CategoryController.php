<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Requests\Categories\EditCategoryRequest;
use App\Http\Requests\Categories\ShowCategoryRequest;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoryController extends Controller {
  public function index() {
    return view('categories.index')
      ->with([
        'arrayCategorys' => Category::all(),
      ]);
  }

  public function show(ShowCategoryRequest $objRequest, Category $objCategory) {
    return view('categories.show')
      ->with([
        'objCategory' => $objCategory,
      ]);
  }

  public function create(CreateCategoryRequest $objRequest) {
    return view('categories.create');
  }

  public function edit(EditCategoryRequest $objRequest, Category $objCategory) {
    return view('categories.edit')
      ->with([
        'objCategory' => $objCategory,
      ]);
  }

  public function update(UpdateCategoryRequest $objRequest, Category $objCategory) {
    $objCategory = $objCategory->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Categorie succesvol aangepast!',
        'objCategory' => $objCategory,
      ]);
  }

  public function store(StoreCategoryRequest $objRequest) {
    $objCategory = Category::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Categorie succesvol aangemaakt!',
      ]);
  }

  public function delete(DeleteCategoryRequest $objRequest, Category $objCategory) {
    $objCategory->delete();

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Categorie succesvol verwijderd!',
      ]);
  }
}
