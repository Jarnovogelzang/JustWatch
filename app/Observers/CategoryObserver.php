<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class CategoryObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = Category::class;
}