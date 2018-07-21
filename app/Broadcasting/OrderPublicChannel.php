<?php

namespace App\Broadcasting;

use App\User;

class OrderPublicChannel {
  /**
   * Authenticate the user's access to the channel.
   *
   * @param  \App\User  $user
   * @return array|bool
   */
  public function join(User $objUser, Order $objOrder) {
    return isset($objOrder) && $objOrder && $objOrder->isPaid();
  }
}
