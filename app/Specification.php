<?php

namespace App;

use App\SystemModel;

class Specification extends SystemModel {
  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'stringKey',
    'stringValue',
    'intProductId',
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
  protected $table = 'Spefication';

  /**
   * @return mixed
   */
  public function getCategories() {
    return $this->hasManyThrough(Product::class);
  }

  /**
   * @return mixed
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * Get the value of intProductId
   */
  public function getIntProductId() {
    return $this->intProductId;
  }

  /**
   * @return mixed
   */
  public function getProduct() {
    return $this->belongsTo(Product::class, 'intId', 'intProductId');
  }

  /**
   * Get the value of stringKey
   */
  public function getStringKey() {
    return $this->stringKey;
  }

  /**
   * Get the value of stringValue
   */
  public function getStringValue() {
    return $this->stringValue;
  }

  /**
   * @param $intId
   * @return mixed
   */
  public function setIntId($intId) {
    $this->intId = $intId;

    return $this;
  }

  /**
   * Set the value of intProductId
   *
   * @return  self
   */
  public function setIntProductId($intProductId) {
    $this->intProductId = $intProductId;

    return $this;
  }

  /**
   * Set the value of stringKey
   *
   * @return  self
   */
  public function setStringKey($stringKey) {
    $this->stringKey = $stringKey;

    return $this;
  }

  /**
   * Set the value of stringValue
   *
   * @return  self
   */
  public function setStringValue($stringValue) {
    $this->stringValue = $stringValue;

    return $this;
  }
}
