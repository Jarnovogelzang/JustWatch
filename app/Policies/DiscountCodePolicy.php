<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiscountCodePolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param DiscountCode $objDiscountCode
   */
  public function destroy(User $objUser, DiscountCode $objDiscountCode) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param DiscountCode $objDiscountCode
   */
  public function edit(User $objUser, DiscountCode $objDiscountCode) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param DiscountCode $objDiscountCode
   */
  public function show(User $objUser, DiscountCode $objDiscountCode) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   */
  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param DiscountCode $objDiscountCode
   */
  public function update(User $objUser, DiscountCode $objDiscountCode) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
