<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class OrderObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = Order::class;
}