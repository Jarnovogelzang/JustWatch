<?php

namespace Includes\DataMovers;

class MollieDataMover {
  /**
   * @var mixed
   */
  protected $objCaller;

  /**
   * @param Caller $objCaller
   */
  public function __construct(Caller $objCaller) {
    $this->objCaller = $objCaller;
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