<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class PriceRangeObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = PriceRange::class;
}