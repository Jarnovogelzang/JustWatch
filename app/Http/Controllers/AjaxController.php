<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ajax\FetchCategoriesRequest;
use App\Http\Requests\Ajax\FetchProductByIdRequest;
use App\Http\Requests\Ajax\FetchProductsByCategoryIdRequest;
use App\Http\Requests\Ajax\FetchProductSpecificationsByProductId;
use App\Http\Requests\Ajax\FetchProductsRequest;

class AjaxController extends Controller {
  /**
   * @param FetchCategories $objRequests
   */
  public function fetchCategories(FetchCategoriesRequest $objRequest) {
    return response()->json(Category::all()->toArray());
  }

  /**
   * @param FetchDiscountCodesRequest $objRequest
   */
  public function fetchDiscountCodes(FetchDiscountCodesRequest $objRequest) {
    return response()->json(DiscountCode::all()->toArray());
  }

  /**
   * @param FetchOrderRequest $objRequest
   */
  public function fetchOrders(FetchOrderRequest $objRequest) {
    return reponse()->json(Order::all()->toArray());
  }

  /**
   * @param FetchPriceRangesRequest $objRequest
   */
  public function fetchPriceRanges(FetchPriceRangesRequest $objRequest) {
    return response()->json(PriceRange::all()->toArray());
  }

  /**
   * @param FetchProductByIdRequest $objRequest
   */
  public function fetchProductById(FetchProductByIdRequest $objRequest) {
    return response()->json(Product::find($objRequet->input('intProductId'))->toArray());
  }

  /**
   * @param FetchProductSpecificationsByProductId $objRequest
   */
  public function fetchProductSpecificationsByProductId(FetchProductSpecificationsByProductId $objRequest) {
    return reponse()->json(Product::find($objRequest->input('intProductId')->getSpecifications->toArray()));
  }

  /**
   * @param FetchProducts $objRequest
   */
  public function fetchProducts(FetchProductsRequest $objRequest) {
    return response()->json(Product::all()->toArray());
  }

  /**
   * @param FetchProductsByCategoryIdrequest $objRequest
   */
  public function fetchProductsByCategoryId(FetchProductsByCategoryIdRequest $objRequest) {
    return response()->json(Category::find($objRequest->input('intCategoryId')->getProducts->toArray()));
  }

  /**
   * @param FetchUserRequest $objRequest
   */
  public function fetchUsers(FetchUserRequest $objRequest) {
    return response()->json(Order::all()->toArray());
  }

  public function getFeaturedCategories() {
    return response()->json(Category::whereIsFeatured()->get());
  }

  public function getHottestProducts() {
    return response()->json(Product::orderByOrderAmount()->limit(3)->get());
  }
}
