<?php

namespace App;

use App\SystemModel;

class PriceRange extends SystemModel {
  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'floatPriceLow',
    'floatPriceHigh',
    'floatPriceActual',
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
  protected $table = 'PriceRange';

  /**
   * Get the value of floatPriceActual
   *
   * @return  mixed
   */
  public function getFloatPriceActual() {
    return $this->floatPriceActual;
  }

  /**
   * Get the value of floatPriceHigh
   *
   * @return  mixed
   */
  public function getFloatPriceHigh() {
    return $this->floatPriceHigh;
  }

  /**
   * Get the value of floatPriceLow
   *
   * @return  mixed
   */
  public function getFloatPriceLow() {
    return $this->floatPriceLow;
  }

  /**
   * Get the value of intId
   *
   * @return  mixed
   */
  public function getIntId() {
    return $this->intId;
  }

  public function getProducts() {
    $arrayProducts = Products::all();

    foreach ($arrayProducts as $objProduct) {
      if (!($objProduct->getFloatPriceActual() === $this->getFloatPriceActual())) {
        unset($objProduct);
      }
    }

    return array_filter($arrayProducts);
  }

  /**
   * Set the value of floatPriceActual
   *
   * @param  mixed  $floatPriceActual
   *
   * @return  self
   */
  public function setFloatPriceActual($floatPriceActual) {
    $this->floatPriceActual = $floatPriceActual;

    return $this;
  }

  /**
   * Set the value of floatPriceHigh
   *
   * @param  mixed  $floatPriceHigh
   *
   * @return  self
   */
  public function setFloatPriceHigh($floatPriceHigh) {
    $this->floatPriceHigh = $floatPriceHigh;

    return $this;
  }

  /**
   * Set the value of floatPriceLow
   *
   * @param  mixed  $floatPriceLow
   *
   * @return  self
   */
  public function setFloatPriceLow($floatPriceLow) {
    $this->floatPriceLow = $floatPriceLow;

    return $this;
  }

  /**
   * Set the value of intId
   *
   * @param  mixed  $intId
   *
   * @return  self
   */
  public function setIntId($intId) {
    $this->intId = $intId;

    return $this;
  }
}
