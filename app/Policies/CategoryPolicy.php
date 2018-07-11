<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Category $objCategory
   */
  public function destroy(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Category $objCategory
   */
  public function edit(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Category $objCategory
   */
  public function show(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   */
  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Category $objCategory
   */
  public function update(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
