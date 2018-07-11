<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PriceRangePolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param PriceRange $objPriceRange
   */
  public function destroy(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param PriceRange $objPriceRange
   */
  public function edit(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param PriceRange $objPriceRange
   */
  public function show(User $objUser, PriceRange $objPriceRange) {
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
   * @param PriceRange $objPriceRange
   */
  public function update(User $objUser, PriceRange $objPriceRange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
