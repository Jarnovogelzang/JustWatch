<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }

  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function edit(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }

  public function destroy(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  public function show(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }
}
