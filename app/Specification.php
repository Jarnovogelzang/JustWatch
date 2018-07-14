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
   * @return mixed
   */
  public function getProducts() {
    return $this->belongsTo(Product::class, 'intId', 'intProductId');
  }

  /**
   * @param $arrayKeyValues
   */
  public static function getSpecificationsByKeys($arrayKeyValues) {
    $arrayKnownKeys = self::all()->pluck('stringKey');

    foreach (array_diff(array_keys($arrayKeyValues), $arrayKnownKeys) as $stringKey) {
      self::create([
        'stringKey' => $stringKey,
        'stringValue' => $arrayKeyValues['stringKey'],
      ]);
    }

    return self::all();
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
