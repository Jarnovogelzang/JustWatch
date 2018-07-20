<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\DeleteUserRequest;
use App\Http\Requests\Users\EditUserRequest;
use App\Http\Requests\Users\ShowUserRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller {
  /**
   * @param CreateUserRequest $objRequest
   */
  public function create(CreateUserRequest $objRequest) {
    return view('users.create');
  }

  /**
   * @param DeleteUserRequest $objRequest
   * @param User $objUser
   */
  public function delete(DeleteUserRequest $objRequest, User $objUser) {
    return redirect()
      ->back()
      ->with($objUser->deleteModel() ? [
        'stringSuccess' => 'Gebruiker succesvol verwijderd!',
      ] : [
        'stringError' => 'Gebruiker onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditUserRequest $objRequest
   * @param User $objUser
   */
  public function edit(EditUserRequest $objRequest, User $objUser) {
    return view('users.edit');
  }

  public function index() {
    return view('users.index');
  }

  /**
   * @param ShowUserRequest $objRequest
   * @param User $objUser
   */
  public function show(ShowUserRequest $objRequest, User $objUser) {
    return view('users.show');
  }

  /**
   * @param StoreUserRequest $objRequest
   */
  public function store(StoreUserRequest $objRequest) {
    return redirect()
      ->back()
      ->with(User::createModel($objRequest->all()) ? [
        'stringSuccess' => 'Gebruiker succesvol aangemaakt!',
      ] : [
        'stringError' => 'Gebruiker onsuccesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateUserRequest $objRequest
   * @param User $objUser
   */
  public function update(UpdateUserRequest $objRequest, User $objUser) {
    return redirect()
      ->back()
      ->with($objUser->updateModel($objRequest->all()) ? [
        'stringSuccess' => 'Gebruiker succesvol aangepast!',
      ] : [
        'stringError' => 'Gebruiker onsuccesvol aangepast!',
      ]);
  }
}
