<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class SystemModel extends Model {
  use SoftDeletes;

  const CREATED_AT = 'dateCreatedAt';

  const DELETED_AT = 'dateDeletedAt';

  const UPDATED_AT = 'dateUpdatedAt';

  /**
   * @var string
   */
  protected $dataFormat = 'Y-m-d H:i:s';

  /**
   * @var array
   */
  protected $dates = [
    'dateDeletedAt',
    'dateCreatedAt',
    'dateUpdatedAt',
  ];

  /**
   * @var string
   */
  protected $primaryKey = 'intId';

  /**
   * @param $arrayData
   */
  public static function create($arrayData) {
    return DB::transaction(function () use ($arrayData) {
      return parent::create($arrayData);
    });
  }

  /**
   * @return mixed
   */
  public function delete() {
    return DB::transaction(function () {
      return parent::delete();
    });
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
   * @return mixedd
   */
  public function setDateUpdatedAt($dateUpdatedAt) {
    $this->dateUpdatedAt = $dateUpdatedAt;

    return $this;
  }

  /**
   * @param $arrayData
   * @return mixed
   */
  public function updateModel($arrayData, $arrayOptions = array()) {
    return DB::transaction(function () use ($arrayData) {
      return parent::update($arrayData, $arrayOptions);
    });
  }
}