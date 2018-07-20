<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class SpecificationObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = Specification::class;
}