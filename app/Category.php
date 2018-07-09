<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
  use SoftDeletes;

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
    'stringTitle',
  ];

  /**
   * @var array
   */
  protected $hidden = [
    //
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
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * Get the value of stringTitle
   */
  public function getStringTitle() {
    return $this->stringTitle;
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
   * Set the value of intId
   *
   * @return  self
   */
  public function setIntId($intId) {
    $this->intId = $intId;

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
