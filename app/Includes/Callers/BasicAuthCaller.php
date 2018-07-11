<?php

namespace Includes\Callers;
use Includes\Callers\AuthCaller;

class BasisAuthCaller extends AuthCaller {
  /**
   * @param $objGuzzleClient
   */
  public function __construct($objGuzzleClient) {
    parent::__construct($objGuzzleClient);
  }
}