<?php

namespace Includes\Zinc;

use Includes\Callers\BasicAuthCaller;

class ZincCaller extends BasicAuthCaller {
  /**
   * @var mixed
   */
  private static $objInstance;

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

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductById($intProductId) {
    return $this->callUrl('GET', 'products/' . $intProductId, [
      'retailer' => 'aliexpress',
    ]);
  }

  /**
   * @param $intProductId
   * @return mixed
   */
  public function getAliProductPriceById($intProductId) {
    return $this->callUrl('GET', 'products/' . $intProductId . '/offers', [
      'retailer' => 'aliexpress',
    ]);
  }

  /**
   * @param $stringQuery
   * @return mixed
   */
  public function getAliProductsByQuery($stringQuery) {
    return $this->callUrl('GET', 'search', [
      'query' => urlencode($stringQuery),
      'retailer' => 'aliexpress',
    ]);
  }

  /**
   * @param String $stringBaseUrl
   * @param ZINC_DEFAULT_BASE_URLString $stringUsername
   * @param ZINC_DEFAULT_USERNAMEString $stringPassword
   */
  public function getInstance(String $stringBaseUrl = ZINC_DEFAULT_BASE_URL, String $stringUsername = ZINC_DEFAULT_USERNAME, String $stringPassword = ZINC_DEFAULT_PASSWORD) {
    if (!isset(self::$objInstance) && !self::$objInstance) {
      self::$objInstance = new self($stringBaseUrl, $stringUsername, $stringPassword);
    }

    return self::$objInstance;
  }

  /**
   * @param ZincCaller $objInstance
   */
  public static function setObjInstance(ZincCaller $objInstance) {
    self::$objInstance = $objInstance;

    return self;
  }
}