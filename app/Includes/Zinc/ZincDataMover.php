<?php

namespace Includes\Zinc;
use ZincCaller;

class ZincDataMover {
  /**
   * @var mixed
   */
  private $objCaller;

  /**
   * @var mixed
   */
  private static $objInstance;

  /**
   * @param String $stringBaseUrl
   * @param ZINC_DEFAULT_BASE_URLString $stringUsername
   * @param ZINC_DEFAULT_USERNAMEString $stringPassword
   */
  public function __construct(String $stringBaseUrl = ZINC_DEFAULT_BASE_URL, String $stringUsername = ZINC_DEFAULT_USERNAME, String $stringPassword = ZINC_DEFAULT_PASSWORD) {
    $this->objCaller = ZincCaller::getObjInstance($stringBaseUrl, $stringUsername, $stringPassword);
  }

  /**
   * @param $intOrderId
   * @return mixed
   */
  public function getAliOrderById($intId) {
    return $this->objCaller->getAliOrderByIntId($intId);
  }

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductByIntId($intProductId) {
    return $this->objCaller->getAliProductByIntId($intProductId);
  }

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductPriceByIntId($intProductId) {
    return $this->objCaller->getAliProductPriceByIntId($intProductId);
  }

  /**
   * @param $stringQuery
   * @return mixed
   */
  public function getAliProductsByStringQuery($stringQuery) {
    return $this->objCaller->getAliProductsByStringQuery($stringQuery);
  }

  /**
   * Get the value of objCaller
   *
   * @return  mixed
   */
  public function getObjCaller() {
    return $this->objCaller;
  }

  /**
   * @param $stringBaseUrl
   * @param MOLLIE_DEFAULT_BASE_URL $stringToken
   */
  public function getObjInstance(String $stringBaseUrl = ZINC_DEFAULT_BASE_URL, String $stringUsername = ZINC_DEFAULT_USERNAME, String $stringPassword = ZINC_DEFAULT_PASSWORD) {
    if (!isset(self::$objInstance) && !self::$objInstance) {
      self::$objInstance = new self($stringBaseUrl, $stringUsername, $stringPassword);
    }

    return self::$objInstance;
  }

  /**
   * Set the value of objCaller
   *
   * @param  mixed  $objCaller
   *
   * @return  self
   */
  public function setObjCaller($objCaller) {
    $this->objCaller = $objCaller;

    return $this;
  }
}