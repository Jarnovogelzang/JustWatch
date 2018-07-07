<?php

namespace App\Http\Controllers;

class UserController extends Controller {
  public function index() {
    return view('users.index')
      ->with([
        'arrayUsers' => User::all(),
      ]);
  }

  public function show(ShowUserRequest $objRequest, User $objUser) {
    return view('users.show')
      ->with([
        'objUser' => $objUser,
      ]);
  }

  public function create(CreateUserRequest $objRequest) {
    return view('users.create');
  }

  public function edit(EditUserRequest $objRequest, User $objUser) {
    return view('users.edit')
      ->with([
        'objUser' => $objUser,
      ]);
  }

  public function update(UpdateUserRequest $objRequest, User $objUser) {
    $objUser = $objUser->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Gebruiker succesvol aangepast!',
        'objUser' => $objUser,
      ]);
  }

  public function store(StoreUserRequest $objRequest) {
    $objUser = User::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Gebruiker succesvol aangemaakt!',
      ]);
  }

  public function delete(DeleteUserRequest $objRequest, User $objUser) {
    $objUser->delete();

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Gebruiker succesvol verwijderd!',
      ]);
  }
}
