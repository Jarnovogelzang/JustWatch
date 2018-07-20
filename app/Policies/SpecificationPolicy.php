<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class SpecificationPolicy {
  use HandlesAuthorization;

  /**
   * @param User $objUser
   */
  public function create(User $objUser) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUse
   * @param Specification $objSpecificationr
   */
  public function destroy(User $objUse, Specification $objSpecificationr) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Specification $objSpecification
   */
  public function edit(User $objUser, Specification $objSpecification) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Specification $objSpecification
   */
  public function show(User $objUser, Specification $objSpecification) {
    return isset($objUser) && $objUser;
  }

  /**
   * @param User $objUser
   * @param Specification $objSpecification
   */
  public function store(User $objUser, Specification $objSpecification) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }

  /**
   * @param User $objUser
   * @param Specification $objSpecification
   */
  public function update(User $objUser, Specification $objSpecification) {
    return isset($objUser) && $objUser && $objUser->isAdmin();
  }
}
