<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class TagObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = Tag::class;
}