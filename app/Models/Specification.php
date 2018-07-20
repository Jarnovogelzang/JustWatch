<?php

namespace App\Models;

use App\Models\SystemModel;

class Specification extends SystemModel {
  /**
   * @var array
   */
  protected $casts = [
    'intId' => 'integer',
    'stringKey' => 'string',
    'stringValue' => 'string',
    'intProductId' => 'integer',
  ];

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
  protected $table = 'Specification';

  /**
   * Get the value of intId
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
    return $this->belongsTo(Product::class, 'intId', 'intUserId');
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
   * Set the value of intId
   *
   * @return  self
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
