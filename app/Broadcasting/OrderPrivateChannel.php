<?php

namespace App\Broadcasting;

use App\User;

class OrderPrivateChannel {
  /**
   * Create a new channel instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  /**
   * Authenticate the user's access to the channel.
   *
   * @param  \App\User  $user
   * @return array|bool
   */
  public function join(User $objUser, Order $objOrder) {
    return $objUser->getIntId() === $objOrder->getIntUserId();
  }
}
