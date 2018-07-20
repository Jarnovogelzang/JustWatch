<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUse
   * @param Tag $objTag
   */
  public function destroy(User $objUse, Tag $objTag) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Tag $objTag
   */
  public function edit(User $objUser, Tag $objTag) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Tag $objTag
   */
  public function show(User $objUser, Tag $objTag) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   * @param Tag $objTag
   */
  public function store(User $objUser, Tag $objTag) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Tag $objTag
   */
  public function update(User $objUser, Tag $objTag) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
