<?php

use Includes\Callers\AuthCaller;

class OAuthCaller extends AuthCaller {
  /**
   * @param $objGuzzleClient
   */
  public function __construct($objGuzzleClient) {
    parent::__construct($objGuzzleClient);
  }
}