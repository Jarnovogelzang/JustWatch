<?php

namespace App;

use App\Category;
use App\Order;
use App\SystemModel;
use Illuminate\Database\Eloquent\Builder;

class Product extends SystemModel {
  use SoftDeletes;

  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'stringDescription',
    'floatPrice',
    'stringTitle',
  ];

  /**
   * @var array
   */
  protected $hidden = [
    //
  ];

  /**
   * @var string
   */
  protected $primaryKey = 'intId';

  /**
   * @var string
   */
  protected $table = 'Product';

  public function getActualPrice() {
    $floatPrice = $this->getAliData()['floatPrice'];

    return PriceRange::where([
      ['floatPriceLow', '<=', $floatPrice],
      ['floatPriceHigh', '>=', $floatPrice],
    ])->first()
      ->getFloatPriceActual();
  }

  /**
   * @param ZincDataMover $objZincDataMover
   * @return mixed
   */
  public function getAliData(ZincDataMover $objZincDataMover) {
    $intAliId = $this->getIntAliId();

    return $this->makeResponse(Cache::remember('fetchAliDataByAliId', 15, function ($objZincDataMover, $intAliId) {
      return $objZincDataMover->fetchAliProductById($intAliId);
    }));
  }

  /**
   * @return mixed
   */
  public function getCategories() {
    return $this->belongsToMany(Category::class, 'ProductCategory', 'intCategoryId', 'intProductId');
  }

  /**
   * Get the value of floatPrice
   */
  public function getFloatPrice() {
    return $this->floatPrice;
  }

  /**
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * @return mixed
   */
  public function getOrders() {
    return $this->belongsToMany(Order::class, 'ProductOrder', 'intProductId', 'intOrderId');
  }

  public function getPriceRange() {
    return PriceRange::where('floatPriceActual', '=', $this->getFloatPriceActual())->first();
  }

  /**
   * @return mixed
   */
  public function getSpecifications() {
    return $this->hasMany(Specification::class, 'intId', 'intProductId');
  }

  /**
   * Get the value of stringDescription
   */
  public function getStringDescription() {
    return $this->stringDescription;
  }

  /**
   * Get the value of stringTitle
   */
  public function getStringTitle() {
    return $this->stringTitle;
  }

  /**
   * @param Builder $objBuilder
   * @return mixed
   */
  public function scopeOrderByOrderAmount(Builder $objBuilder) {
    return $objBuilder->withCount('getOrders')->orderBy('get_orders_count');
  }

  /**
   * @param Builder $objBuilder
   * @param int $intMinOrders
   * @return mixed
   */
  public function scopeWhereHasMinAmountOfOrders(Builder $objBuilder, int $intMinOrders) {
    return $objBuilder->has('getOrders', '>=', $intMinOrders);
  }

  /**
   * @return mixed
   */
  public function setAliDefaultData() {
    $arrayData = $this->getAliData();

    $this->getSpecifications()->sync(array_map(function ($objSpecification) {
      return (new Specification())->setStringKey($objSpecification['stringKey'])->setStringValue($objSpecification['stringValue'])->getIntId();
    }, $arrayData));

    $this->update([
      'stringTitle' => $arrayData['stringTitle'],
      'stringDescription' => $arrayData['stringDescription'],
    ])->save();

    return $this;
  }

  /**
   * Set the value of floatPrice
   *
   * @return  self
   */
  public function setFloatPrice($floatPrice) {
    $this->floatPrice = $floatPrice;

    return $this;
  }

  /**
   * Set the value of intId
   *
   * @return  self
   */
  public function setIntId($intId) {
    $this->intId = $intId;

    return $this;
  }

  /**
   * Set the value of stringDescription
   *
   * @return  self
   */
  public function setStringDescription($stringDescription) {
    $this->stringDescription = $stringDescription;

    return $this;
  }

  /**
   * Set the value of stringTitle
   *
   * @return  self
   */
  public function setStringTitle($stringTitle) {
    $this->stringTitle = $stringTitle;

    return $this;
  }
}
