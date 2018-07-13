<?php

namespace Includes\Mollie;

class MollieDataMover {
  /**
   * @var mixed
   */
  private $objCaller;

  /**
   * @var mixed
   */
  private static $objInstance;

  /**
   * @param Caller $objCaller
   */
  public function __construct($stringBaseUrl = MOLLIE_DEFAULT_BASE_URL, $stringToken = MOLLIE_DEFAULT_TOKEN) {
    $this->objCaller = MollieCaller::getObjInstance($stringBaseUrl, $stringToken);
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
   * Get the value of objCaller
   *
   * @return  mixed
   */
  public function getObjCaller() {
    return $this->objCaller;
  }

  /**
   * @param int $intPaymentId
   * @return mixed
   */
  public function getPaymentById(int $intPaymentId) {
    return $this->objCaller->getPayment($intPaymentId);
  }

  /**
   * @return mixed
   */
  public function getPayments() {
    return $this->objCaller->getPayments();
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

  /**
   * @param Order $objOrder
   * @param array $arrayData
   */
  public function storePayment(Order $objOrder, array $arrayData) {
    return $this->objCaller->storePayment($objOrder, $arrayData);
  }
}