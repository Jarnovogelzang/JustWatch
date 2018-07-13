<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specification extends Model {
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
  public function getDateCreatedAt() {
    return $this->dateCreatedAt;
  }

  /**
   * @return mixed
   */
  public function getDateDeletedAt() {
    return $this->dateDeletedAt;
  }

  /**
   * @return mixed
   */
  public function getDateUpdatedAt() {
    return $this->dateUpdatedAt;
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
   * @param $dateCreatedAt
   * @return mixed
   */
  public function setDateCreatedAt($dateCreatedAt) {
    $this->dateCreatedAt = $dateCreatedAt;

    return $this;
  }

  /**
   * @param $dateDeletedAt
   * @return mixed
   */
  public function setDateDeletedAt($dateDeletedAt) {
    $this->dateDeletedAt = $dateDeletedAt;

    return $this;
  }

  /**
   * @param $dateUpdatedAt
   * @return mixed
   */
  public function setDateUpdatedAt($dateUpdatedAt) {
    $this->dateUpdatedAt = $dateUpdatedAt;

    return $this;
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
