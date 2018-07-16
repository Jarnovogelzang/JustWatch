<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ajax\FetchCategoriesRequest;
use App\Http\Requests\Ajax\FetchProductByIdRequest;
use App\Http\Requests\Ajax\FetchProductsByCategoryIdRequest;
use App\Http\Requests\Ajax\FetchProductSpecificationsByProductId;
use App\Http\Requests\Ajax\FetchProductsRequest;

class AjaxController extends Controller {
  /**
   * @var mixed
   */
  private $floatCacheDurationInMinutes;

  /**
   * @param $floatCacheDurationInMinutes
   */
  public function __construct($floatCacheDurationInMinutes = 15) {
    $this->floatCacheDurationInMinutes = app()->environment('production') ? $floatCacheDurationInMinutes : 0;
  }

  /**
   * @param FetchCategories $objRequests
   */
  public function fetchCategories(FetchCategoriesRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchCategories', $this->floatcacheDurationInMinutes, function () {
      return Category::all()->toArray();
    }));
  }

  /**
   * @param FetchCategoryByCategoryIdRequest $objRequest
   * @param Category $objCategory
   */
  public function fetchCategoryByCategoryId(FetchCategoryByCategoryIdRequest $objRequest, Category $objCategory) {
    return $this->makeResponse(Cache::remember('fetchCategoryByCategoryId', $this->floatcacheDurationInMinutes, function ($objCategory) {
      $objCategory->toArray();
    }));
  }

  /**
   * @param fetchCategoryProductsByCategoryId $objRequest
   * @param Category $objCategory
   */
  public function fetchCategoryProductsByCategoryId(fetchCategoryProductsByCategoryId $objRequest, Category $objCategory) {
    return $this->makeResponse(Cache::remember('fetchCategoryProductsByCategoryId', $this->floatcacheDurationInMinutes, function ($objCategory) {
      $objCategory->getProducts->toArray();
    }));
  }

  /**
   * @param FetchDiscountCodesRequest $objRequest
   */
  public function fetchDiscountCodes(FetchDiscountCodesRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchDiscountCodes', $this->floatcacheDurationInMinutes, function () {
      DiscountCode::all()->toArray();
    }));
  }

  /**
   * @return mixed
   */
  public function fetchFeaturedCategories() {
    return $this->makeResponse(Cache::remember('fetchFeaturedCategories', $this->floatcacheDurationInMinutes, function () {
      return Category::whereIsFeatured()->get();
    }));
  }

  /**
   * @return mixed
   */
  public function fetchHottestProducts() {
    return $this->makeResponse(Cache::remember('fetchHottestProducts', $this->floatcacheDurationInMinutes, function () {
      return Product::orderByOrderAmount()->paginate(3)->get();
    }));
  }

  /**
   * @param fetchOrderByOrderId $objRequest
   */
  public function fetchOrderByOrderId(FetchOrderByOrderIdRequest $objRequest, Order $objOrder) {
    return $this->makeResponse(Cache::remember('fetchOrderByOrderId', $this->floatcacheDurationInMinutes, function ($objOrder) {
      return $objOrder->toArray();
    }));
  }

  /**
   * @param FetchOrderRequest $objRequest
   */
  public function fetchOrders(FetchOrderRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchOrders', $this->floatcacheDurationInMinutes, function () {
      return Order::all()->toArray();
    }));
  }

  /**
   * @param FetchPriceRangeByPriceRangeIdRequest $objRequest
   * @param PriceRange $objPriceRange
   * @return mixed
   */
  public function fetchPriceRangeByPriceRangeId(FetchPriceRangeByPriceRangeIdRequest $objRequest, PriceRange $objPriceRange) {
    return $this->makeResponse(Cache::remember('fetchPriceRangeByPriceRangeId', $this->floatcacheDurationInMinutes, function ($objPriceRange) {
      return $objPriceRange->toArray();
    }));
  }

  /**
   * @param FetchPriceRangesRequest $objRequest
   */
  public function fetchPriceRanges(FetchPriceRangesRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchPriceRanges', $this->floatcacheDurationInMinutes, function () {
      return PriceRange::all()->toArray();
    }));
  }

  /**
   * @param FetchProductByIdRequest $objRequest
   */
  public function fetchProductByProductId(FetchProductByIdRequest $objRequest, Product $objProduct) {
    return $this->makeResponse(Cache::remember('fetchProductByProductId', $this->floatcacheDurationInMinutes, function ($objProduct) {
      return $objProduct->toArray();
    }));
  }

  /**
   * @param FetchProductSpecificationsByProductId $objRequest
   */
  public function fetchProductSpecificationsByProductId(FetchProductSpecificationsByProductId $objRequest, Product $objProduct) {
    return $this->makeResponse(Cache::remember('fetchProductSpecificationsByProductId', $this->floatcacheDurationInMinutes, function ($objProduct) {
      return Product::find($objProduct->getSpecifications->toArray());
    }));
  }

  /**
   * @param FetchProducts $objRequest
   */
  public function fetchProducts(FetchProductsRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchProducts', $this->floatcacheDurationInMinutes, function () {
      return Product::all()->toArray();
    }));
  }

  /**
   * @param FetchProductsByCategoryIdrequest $objRequest
   */
  public function fetchProductsByCategoryId(FetchProductsByCategoryIdRequest $objRequest, Category $objCategory) {
    return $this->makeResponse(Cache::remember('fetchProductsByCategoryId', $this->floatcacheDurationInMinutes, function ($objCategory) {
      return $objCategory->getProducts->toArray();
    }));
  }

  /**
   * @param FetchUserByUserIdRequest $objRequest
   * @param User $objUser
   * @return mixed
   */
  public function fetchUserByUserId(FetchUserByUserIdRequest $objRequest, User $objUser) {
    return $this->makeResponse(Cache::remember('fetchUserByUserId', $this->floatcacheDurationInMinutes, function ($objUser) {
      return $objUser->toArray();
    }));
  }

  /**
   * @param FetchUserRequest $objRequest
   */
  public function fetchUsers(FetchUserRequest $objRequest) {
    return $this->makeResponse(Cache::remember('fetchUsers', $this->floatcacheDurationInMinutes, function () {
      return Order::all()->toArray();
    }));
  }

  /**
   * @param array $arrayData
   */
  public function makeReponse(array $arrayData) {
    return response()->json($arrayData);
  }
}
