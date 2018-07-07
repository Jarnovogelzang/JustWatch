<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy {
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct() {
    //
  }

  public function update() {
    return true;
  }

  public function create() {
    return true;
  }

  public function edit() {
    return true;
  }

  public function destroy() {
    return true;
  }

  public function store() {
    return true;
  }

  public function show() {
    return true;
  }
}
