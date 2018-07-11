<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceRange extends Model {
  use SoftDeletes;

  const CREATED_AT = 'dateCreatedAt';

  const DELETED_AT = 'dateDeletedAt';

  const UPDATED_AT = 'dateUpdatedAt';

  /**
   * @var array
   */
  protected $dates = [
    'dateDeletedAt',
    'dateCreatedAt',
    'dateUpdatedAt',
  ];

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
   * Get the value of dateCreatedAt
   *
   * @return  mixed
   */
  public function getDateCreatedAt() {
    return $this->dateCreatedAt;
  }

  /**
   * Get the value of dateDeletedAt
   *
   * @return  mixed
   */
  public function getDateDeletedAt() {
    return $this->dateDeletedAt;
  }

  /**
   * Get the value of dateUpdatedAt
   *
   * @return  mixed
   */
  public function getDateUpdatedAt() {
    return $this->dateUpdatedAt;
  }

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

  /**
   * Set the value of dateCreatedAt
   *
   * @param  mixed  $dateCreatedAt
   *
   * @return  self
   */
  public function setDateCreatedAt($dateCreatedAt) {
    $this->dateCreatedAt = $dateCreatedAt;

    return $this;
  }

  /**
   * Set the value of dateDeletedAt
   *
   * @param  mixed  $dateDeletedAt
   *
   * @return  self
   */
  public function setDateDeletedAt($dateDeletedAt) {
    $this->dateDeletedAt = $dateDeletedAt;

    return $this;
  }

  /**
   * Set the value of dateUpdatedAt
   *
   * @param  mixed  $dateUpdatedAt
   *
   * @return  self
   */
  public function setDateUpdatedAt($dateUpdatedAt) {
    $this->dateUpdatedAt = $dateUpdatedAt;

    return $this;
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
