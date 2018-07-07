<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function create(User $objUser) {
    return isset($objUser) && $objUser;
  }

  public function edit(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function destroy(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function store(User $objUser) {
    return isset($objUser) && $objUser;
  }

  public function show(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->getIntId() === $objOrder->getIntUserId();
  }
}
