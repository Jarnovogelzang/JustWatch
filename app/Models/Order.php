<?php

namespace App\Models;

use App\Models\SystemModel;
use App\User;

class Order extends SystemModel {
  /**
   * @var array
   */
  protected $casts = [
    'intId' => 'integer',
    'intUserId' => 'integer',
    'boolIsPaid' => 'boolean',
  ];

  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'intUserId',
    'boolIsPaid',
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
  protected $table = 'Order';

  /**
   * Get the value of boolIsPaid
   *
   * @return  mixed
   */
  public function getBoolIsPaid() {
    return $this->boolIsPaid;
  }

  /**
   * @return mixed
   */
  public function getCategories() {
    return $this->hasManyThrough(Product::class);
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
   * Get the value of intUserId
   *
   * @return  mixed
   */
  public function getIntUserId() {
    return $this->intUserId;
  }

  /**
   * @return mixed
   */
  public function getUser() {
    return $this->belongsTo(User::class, 'intUserId', 'intId');
  }

  /**
   * Set the value of boolIsPaid
   *
   * @param  mixed  $boolIsPaid
   *
   * @return  self
   */
  public function setBoolIsPaid($boolIsPaid) {
    $this->boolIsPaid = $boolIsPaid;

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

  /**
   * Set the value of intUserId
   *
   * @param  mixed  $intUserId
   *
   * @return  self
   */
  public function setIntUserId($intUserId) {
    $this->intUserId = $intUserId;

    return $this;
  }
}
