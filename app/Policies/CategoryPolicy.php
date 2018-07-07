<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function edit(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function destroy(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function show(User $objUser, Category $objCategory) {
    return isset($objUser) && $objUser;
  }
}
