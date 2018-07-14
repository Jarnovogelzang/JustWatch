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
    return $this->makeResponse(Category::all()->toArray());
  }

  /**
   * @param FetchCategoryByCategoryIdRequest $objRequest
   * @param Category $objCategory
   */
  public function fetchCategoryByCategoryId(FetchCategoryByCategoryIdRequest $objRequest, Category $objCategory) {
    return $this->makeResponse($objCategory->toArray());
  }

  /**
   * @param fetchCategoryProductsByCategoryId $objRequest
   * @param Category $objCategory
   */
  public function fetchCategoryProductsByCategoryId(fetchCategoryProductsByCategoryId $objRequest, Category $objCategory) {
    return $this->makeResponse($objCategory->getProducts->toArray());
  }

  /**
   * @param FetchDiscountCodesRequest $objRequest
   */
  public function fetchDiscountCodes(FetchDiscountCodesRequest $objRequest) {
    return $this->makeResponse(DiscountCode::all()->toArray());
  }

  /**
   * @param fetchOrderByOrderId $objRequest
   */
  public function fetchOrderByOrderId(FetchOrderByOrderIdRequest $objRequest, Order $objOrder) {
    return $this->makeResponse($objOrder->toArray());
  }

  /**
   * @param FetchOrderRequest $objRequest
   */
  public function fetchOrders(FetchOrderRequest $objRequest) {
    return $this->makeResponse(Order::all()->toArray());
  }

  /**
   * @param FetchPriceRangeByPriceRangeIdRequest $objRequest
   * @param PriceRange $objPriceRange
   * @return mixed
   */
  public function fetchPriceRangeByPriceRangeId(FetchPriceRangeByPriceRangeIdRequest $objRequest, PriceRange $objPriceRange) {
    return $this->makeResponse($objPriceRange->toArray());
  }

  /**
   * @param FetchPriceRangesRequest $objRequest
   */
  public function fetchPriceRanges(FetchPriceRangesRequest $objRequest) {
    return $this->makeResponse(PriceRange::all()->toArray());
  }

  /**
   * @param FetchProductByIdRequest $objRequest
   */
  public function fetchProductByProductId(FetchProductByIdRequest $objRequest, Product $objProduct) {
    return $this->makeResponse($objProduct->toArray());
  }

  /**
   * @param FetchProductSpecificationsByProductId $objRequest
   */
  public function fetchProductSpecificationsByProductId(FetchProductSpecificationsByProductId $objRequest, Product $objProduct) {
    return $this->makeResponse(Product::find($objProduct->getSpecifications->toArray()));
  }

  /**
   * @param FetchProducts $objRequest
   */
  public function fetchProducts(FetchProductsRequest $objRequest) {
    return $this->makeResponse(Product::all()->toArray());
  }

  /**
   * @param FetchProductsByCategoryIdrequest $objRequest
   */
  public function fetchProductsByCategoryId(FetchProductsByCategoryIdRequest $objRequest, Category $objCategory) {
    return $this->makeResponse($objCategory->getProducts->toArray());
  }

  /**
   * @param FetchUserByUserIdRequest $objRequest
   * @param User $objUser
   * @return mixed
   */
  public function fetchUserByUserId(FetchUserByUserIdRequest $objRequest, User $objUser) {
    return $this->makeResponse($objUser->toArray());
  }

  /**
   * @param FetchUserRequest $objRequest
   */
  public function fetchUsers(FetchUserRequest $objRequest) {
    return $this->makeResponse(Order::all()->toArray());
  }

  /**
   * @return mixed
   */
  public function getFeaturedCategories() {
    return $this->makeResponse(Category::whereIsFeatured()->get());
  }

  /**
   * @return mixed
   */
  public function getHottestProducts() {
    return $this->makeResponse(Product::orderByOrderAmount()->limit(3)->get());
  }

  /**
   * @param array $arrayData
   */
  public function makeReponse(array $arrayData) {
    return response()->json($arrayData);
  }
}
