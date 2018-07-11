<?php

namespace Includes\Callers;

class Caller {
  /**
   * @var mixed
   */
  protected $objGuzzleClient;

  /**
   * @param $objGuzzleClient
   */
  public function __construct($objGuzzleClient) {
    $this->objGuzzleClient = $objGuzzleClient;
  }

  /**
   * @param $stringMethod
   * @param $stringUrl
   * @param $arrayData
   */
  public function callUrl($stringMethod, $stringUrl, $arrayData) {
    return $this->objGuzzleClient->request($stringMethod, $stringUrl, $stringMethod == 'GET' ? ['query' => $arrayData] : ['form_params' => $arrayData]);
  }

  /**
   * Get the value of objGuzzleClient
   *
   * @return  mixed
   */
  public function getObjGuzzleClient() {
    return $this->objGuzzleClient;
  }

  /**
   * Set the value of objGuzzleClient
   *
   * @param  mixed  $objGuzzleClient
   *
   * @return  self
   */
  public function setObjGuzzleClient($objGuzzleClient) {
    $this->objGuzzleClient = $objGuzzleClient;

    return $this;
  }
}