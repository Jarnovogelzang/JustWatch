<?php

namespace Includes\Mollie;

use App\Order;

class MollieCaller extends OAuthCaller {
  /**
   * @var mixed
   */
  private static $objInstance;

  /**
   * @param $stringBaseUrl
   * @param $stringToken
   */
  public function __construct($stringBaseUrl, $stringToken) {
    parent::__construct(new GuzzleClient([
      'base_uri' => $stringBaseUrl,
      'headers' => [
        'Authorization' => 'Bearer ' . $stringToken,
      ],
    ]));
  }

  /**
   * @param $stringBaseUrl
   * @param MOLLIE_DEFAULT_BASE_URL $stringToken
   */
  public function getObjInstance($stringBaseUrl = MOLLIE_DEFAULT_BASE_URL, $stringToken = MOLLIE_DEFAULT_TOKEN) {
    if (!isset(self::$objInstance) && !self::$objInstance) {
      self::$objInstance = new self($stringBaseUrl, $stringToken);
    }

    return self::$objInstance;
  }

  /**
   * @param $intPaymentId
   * @return mixed
   */
  public function getPaymentById($intPaymentId) {
    return $this->callUrl('GET', 'payments/' . $intPaymentId, []);
  }

  /**
   * @return mixed
   */
  public function getPayments() {
    return $this->callUrl('GET', 'payments', []);
  }

  /**
   * @param MollieCaller $objInstance
   */
  public static function setObjInstance(MollieCaller $objInstance) {
    self::$objInstance = $objInstance;

    return self;
  }

  /**
   * @param Order $objOrder
   * @param array $arrayData
   * @return mixed
   */
  public function storePayment(Order $objOrder, array $arrayData) {
    return $this->callUrl('POST', 'payments', $arrayData);
  }
}