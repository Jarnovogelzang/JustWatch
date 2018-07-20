<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class ProductObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = Product::class;
}