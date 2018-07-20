<?php

namespace App\Broadcasting;

use App\User;

class OrderPrivateChannel {
  /**
   * Authenticate the user's access to the channel.
   *
   * @param  \App\User  $user
   * @return array|bool
   */
  public function join(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && Auth::check() && Auth::id() === $objUser->getIntId() && $objUser->getIntId() === $objOrder->getIntUserId();
  }
}
