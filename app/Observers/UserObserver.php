<?php

namespace App\Observers;

use App\Observers\SystemObserver;

class UserObserver extends SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel = User::class;
}