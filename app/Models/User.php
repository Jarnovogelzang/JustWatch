<?php

namespace App\Models;

use App\Order;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
  use Notifiable;
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
    'stringName',
    'stringEmail',
    'stringCountry',
    'stringZipCode',
    'stringAdress',
    'intHouseNumber',
    'stringTelephoneNumber',
  ];

  /**
   * @var array
   */
  protected $hidden = [
    'stringPassword',
    'stringRememberToken',
  ];

  /**
   * @var string
   */
  protected $table = 'User';

  /**
   * @return mixed
   */
  public function getCategories() {
    return $this->hasManyThrough(Product::class);
  }

  /**
   * Get the value of dateBirthDate
   */
  public function getDateBirthDate() {
    return $this->dateBirthDate;
  }

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
   * Get the value of intHouseNumber
   */
  public function getIntHouseNumber() {
    return $this->intHouseNumber;
  }

  /**
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * @return mixed
   */
  public function getOrders() {
    return $this->hasMany(Order::class, 'intId', 'intUserId');
  }

  /**
   * @return mixed
   */
  public function getProducts() {
    return $this->hasManyThrough(Order::class);
  }

  /**
   * Get the value of stringCountry
   */
  public function getStringCountry() {
    return $this->stringCountry;
  }

  /**
   * Get the value of stringEmail
   */
  public function getStringEmail() {
    return $this->stringEmail;
  }

  /**
   * Get the value of stringPassword
   */
  public function getStringPassword() {
    return $this->stringPassword;
  }

  /**
   * Get the value of stringRememberToken
   */
  public function getStringRememberToken() {
    return $this->stringRememberToken;
  }

  /**
   * Get the value of stringTelephoneNumber
   */
  public function getStringTelephoneNumber() {
    return $this->stringTelephoneNumber;
  }

  /**
   * Get the value of stringZipCode
   */
  public function getStringZipCode() {
    return $this->stringZipCode;
  }

  /**
   * Set the value of dateBirthDate
   *
   * @return  self
   */
  public function setDateBirthDate($dateBirthDate) {
    $this->dateBirthDate = $dateBirthDate;

    return $this;
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
   * Set the value of intHouseNumber
   *
   * @return  self
   */
  public function setIntHouseNumber($intHouseNumber) {
    $this->intHouseNumber = $intHouseNumber;

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
   * Set the value of stringCountry
   *
   * @return  self
   */
  public function setStringCountry($stringCountry) {
    $this->stringCountry = $stringCountry;

    return $this;
  }

  /**
   * Set the value of stringPassword
   *
   * @return  self
   */
  public function setStringPassword($stringPassword) {
    $this->stringPassword = $stringPassword;

    return $this;
  }

  /**
   * Set the value of stringRememberToken
   *
   * @return  self
   */
  public function setStringRememberToken($stringRememberToken) {
    $this->stringRememberToken = $stringRememberToken;

    return $this;
  }

  /**
   * Set the value of stringTelephoneNumber
   *
   * @return  self
   */
  public function setStringTelephoneNumber($stringTelephoneNumber) {
    $this->stringTelephoneNumber = $stringTelephoneNumber;

    return $this;
  }

  /**
   * Set the value of stringZipCode
   *
   * @return  self
   */
  public function setStringZipCode($stringZipCode) {
    $this->stringZipCode = $stringZipCode;

    return $this;
  }
}
