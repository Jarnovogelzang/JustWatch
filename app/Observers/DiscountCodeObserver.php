<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class DiscountCodeObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = DiscountCode::class;
}