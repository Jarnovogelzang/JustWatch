<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
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
    'intUserId',
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
