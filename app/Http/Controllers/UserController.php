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
    Log::info('Creating an new User.');

    return view('users.create');
  }

  /**
   * @param DeleteUserRequest $objRequest
   * @param User $objUser
   */
  public function delete(DeleteUserRequest $objRequest, User $objUser) {
    Log::critical('Deleting an User with ID as ' . $objUser->getIntId() . '.');

    return redirect()
      ->back()
      ->with($objUser->delete() ? [
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
    Log::info('Editing an User with ID as ' . $objUser->getIntId() . '.');

    return view('users.edit')
      ->with([
        'objUser' => $objUser,
      ]);
  }

  public function index() {
    Log::info('Showing all the Users.');

    return view('users.index')
      ->with([
        'arrayUsers' => User::all(),
      ]);
  }

  /**
   * @param ShowUserRequest $objRequest
   * @param User $objUser
   */
  public function show(ShowUserRequest $objRequest, User $objUser) {
    Log::info('Showing an User with ID as ' . $objUser->getIntId() . '.');

    return view('users.show')
      ->with([
        'objUser' => $objUser,
      ]);
  }

  /**
   * @param StoreUserRequest $objRequest
   */
  public function store(StoreUserRequest $objRequest) {
    Log::info('Storing an new User.');

    $objUser = User::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Gebruiker succesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateUserRequest $objRequest
   * @param User $objUser
   */
  public function update(UpdateUserRequest $objRequest, User $objUser) {
    Log::info('Updating an User with ID as ' . $objUser->getIntId() . '.');

    $objUser = $objUser->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Gebruiker succesvol aangepast!',
        'objUser' => $objUser,
      ]);
  }
}
