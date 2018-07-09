<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specification extends Model {
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
    'stringName',
  ];

  /**
   * @var array
   */
  protected $hidden = [
    //
  ];

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
  public function getStringName() {
    return $this->stringName;
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
   * @param $stringName
   * @return mixed
   */
  public function setStringName($stringName) {
    $this->stringName = $stringName;

    return $this;
  }
}
