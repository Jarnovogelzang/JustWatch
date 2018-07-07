<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function edit(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function destroy(User $objUse, Product $objProductr) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function store(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function show(User $objUser, Product $objProduct) {
    return isset($objUser) && $objUser;
  }
}
