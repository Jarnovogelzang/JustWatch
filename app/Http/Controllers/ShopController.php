<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller {
  public function basket() {

  }

  public function categories() {

  }

  /**
   * @param String $stringCategoryName
   */
  public function category(String $stringCategoryName) {
    $objCategory = Category::whereStringTitle($stringCategoryName)->firstOrFail();
  }

  public function checkout() {

  }

  public function index() {

  }

  /**
   * @param String $stringProductTitle
   */
  public function product(String $stringProductTitle) {
    $objProduct = Product::whereStringTitle($stringProductTitle)->firstOrFail();
  }

  public function products() {

  }
}
