<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUse
   * @param Product $objProducts
   */
  public function destroy(User $objUse, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Product $objProduct
   */
  public function edit(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Product $objProduct
   */
  public function show(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   * @param Product $objProduct
   */
  public function store(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Product $objProduct
   */
  public function update(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
