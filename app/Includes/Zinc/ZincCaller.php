<?php

namespace Includes\Zinc;

use Includes\Callers\BasicAuthCaller;

class ZincCaller extends BasicAuthCaller {
  /**
   * @var mixed
   */
  private static $objInstance;

  /**
   * @var mixed
   */
  private $stringRetailer;

  /**
   * @param String $stringBaseUrl
   * @param String $stringUsername
   * @param nullString $stringPassword
   */
  public function __construct(String $stringBaseUrl, String $stringUsername = null, String $stringPassword = null) {
    parent::__construct(new GuzzleClient([
      'base_uri' => $stringBaseUrl,
      'headers' => [
        'Authorization' => $stringUsername . (isset($stringPassword) && $stringPassword ? ':' . $stringPassword : ''),
      ],
    ]));
  }

  public function checkStringRetailer() {
    if (!(isset($this->stringRetailer) && $this->stringRetailer)) {
      $this->stringRetailer = ZINC_DEFAULT_RETAILER;
    }
  }

  /**
   * @param $intId
   * @return mixed
   */
  public function getAliOrderByIntId($intId) {
    return $this->callUrl('GET', 'orders/' . $intId, []);
  }

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductByIntId($intProductId) {
    $this->checkStringRetailer();

    return $this->callUrl('GET', 'products/' . $intProductId, [
      'retailer' => $this->getStringRetailer(),
    ]);
  }

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductPriceByIntId($intProductId) {
    $this->checkStringRetailer();

    return $this->callUrl('GET', 'products/' . $intProductId . '/offers', [
      'retailer' => $this->getStringRetailer(),
    ]);
  }

  /**
   * @param $stringQuery
   * @return mixed
   */
  public function getAliProductsByStringQuery($stringQuery) {
    $this->checkStringRetailer();

    return $this->callUrl('GET', 'search', [
      'query' => urlencode($stringQuery),
      'retailer' => $this->getStringRetailer(),
    ]);
  }

  /**
   * @param String $stringBaseUrl
   * @param ZINC_DEFAULT_BASE_URLString $stringUsername
   * @param ZINC_DEFAULT_USERNAMEString $stringPassword
   */
  public function getObjInstance(String $stringBaseUrl = ZINC_DEFAULT_BASE_URL, String $stringUsername = ZINC_DEFAULT_USERNAME, String $stringPassword = ZINC_DEFAULT_PASSWORD) {
    if (!isset(self::$objInstance) && !self::$objInstance) {
      self::$objInstance = new self($stringBaseUrl, $stringUsername, $stringPassword);
    }

    return self::$objInstance;
  }

  /**
   * Get the value of stringRetailer
   */
  public function getStringRetailer() {
    return $this->stringRetailer;
  }

  /**
   * @param ZincCaller $objInstance
   */
  public static function setObjInstance(ZincCaller $objInstance) {
    self::$objInstance = $objInstance;

    return self;
  }

  /**
   * Set the value of stringRetailer
   *
   * @return  self
   */
  public function setStringRetailer($stringRetailer) {
    $this->stringRetailer = $stringRetailer;

    return $this;
  }
}