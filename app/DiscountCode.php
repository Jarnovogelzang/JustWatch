<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model {
  use SoftDeletes;

  const CREATED_AT = 'dateCreatedAt';

  const DELETED_AT = 'dateDeletedAt';

  const DISCOUNT_AMOUNT = 'DISCOUNT_AMOUNT';

  const DISCOUNT_PERCENTAGE = 'DISCOUNT_PERCENTAGE';

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
    'stringDiscountCode',
    'enumDiscountType',
    'floatDiscount',
  ];

  /**
   * Get the value of dateCreatedAt
   */
  public function getDateCreatedAt() {
    return $this->dateCreatedAt;
  }

  /**
   * Get the value of dateDeletedAt
   */
  public function getDateDeletedAt() {
    return $this->dateDeletedAt;
  }

  /**
   * Get the value of dateUpdatedAt
   */
  public function getDateUpdatedAt() {
    return $this->dateUpdatedAt;
  }

  /**
   * Get the value of enumDiscountType
   */
  public function getEnumDiscountType() {
    return $this->enumDiscountType;
  }

  /**
   * Get the value of floatDiscount
   */
  public function getFloatDiscount() {
    return $this->floatDiscount;
  }

  /**
   * @param $floatPrice
   * @return mixed
   */
  public function getFloatPriceWithDiscount($floatPrice) {
    $floatPrice = $this->getEnumDiscountType() == DISCOUNT_AMOUNT ? $floatPrice - $this->getFloatDiscount() : $floatPrice * (1 - $this->getFloatDiscount() / 100);

    return $floatPrice >= 0 ? floatval($floatPrice) : floatval(0);
  }

  /**
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * Get the value of stringDiscountCode
   */
  public function getStringDiscountCode() {
    return $this->stringDiscountCode;
  }

  /**
   * Set the value of dateCreatedAt
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
   * @return  self
   */
  public function setDateDeletedAt($dateDeletedAt) {
    $this->dateDeletedAt = $dateDeletedAt;

    return $this;
  }

  /**
   * Set the value of dateUpdatedAt
   *
   * @return  self
   */
  public function setDateUpdatedAt($dateUpdatedAt) {
    $this->dateUpdatedAt = $dateUpdatedAt;

    return $this;
  }

  /**
   * Set the value of enumDiscountType
   *
   * @return  self
   */
  public function setEnumDiscountType($enumDiscountType) {
    $this->enumDiscountType = $enumDiscountType;

    return $this;
  }

  /**
   * Set the value of floatDiscount
   *
   * @return  self
   */
  public function setFloatDiscount($floatDiscount) {
    $this->floatDiscount = $floatDiscount;

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
   * Set the value of stringDiscountCode
   *
   * @return  self
   */
  public function setStringDiscountCode($stringDiscountCode) {
    $this->stringDiscountCode = $stringDiscountCode;

    return $this;
  }
}
