<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
  use RegistersUsers;

  /*
  |--------------------------------------------------------------------------
  | Register Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users as well as their
  | validation and creation. By default this controller uses a trait to
  | provide this functionality without requiring any additional code.
  |
   */

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct() {
    $this->middleware('guest');
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\User
   */
  protected function create(array $arrayData) {
    return User::createModel([
      'stringName' => $arrayData['stringName'],
      'stringEmail' => $arrayData['stringEmail'],
      'stringPassword' => Hash::make($arrayData['stringPassword']),
    ]);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $arrayData) {
    return Validator::make($arrayData, [
      'stringName' => 'required|string|max:255',
      'stringEmail' => 'required|string|email|max:255|unique:users',
      'stringPassword' => 'required|string|min:6|confirmed',
    ]);
  }
}
