<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PriceRangePolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function edit(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function destroy(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function show(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
