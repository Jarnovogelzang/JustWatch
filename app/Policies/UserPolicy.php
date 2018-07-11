<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param User $objUserToChange
   */
  public function destroy(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param User $objUserToChange
   */
  public function edit(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }

  /**
   * @param User $objUser
   * @param User $objUserToChange
   */
  public function show(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }

  /**
   * @param User $objUser
   */
  public function store(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param User $objUserToChange
   */
  public function update(User $objUser, User $objUserToChange) {
    return isset($objUser) && $objUser && $objUser->getId() === $objUserToChange->getId();
  }
}
