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

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   * @param Order $objOrder
   */
  public function destroy(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Order $objOrder
   */
  public function edit(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Order $objOrder
   */
  public function show(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->getIntId() === $objOrder->getIntUserId();
  }

  /**
   * @param User $objUser
   */
  public function store(User $objUser) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   * @param Order $objOrder
   */
  public function update(User $objUser, Order $objOrder) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
