<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('user', $this->route('objUser'));
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'stringEmail' => 'required|email',
      'stringName' => 'nullable|sometimes|alpha',
      'stringPassword' => 'required|string',
      'stringCountry' => 'nullable|sometimes|alpha',
      'stringZipCode' => 'nullable|sometimes|string',
      'intHouseNumber' => 'nullable|sometimes|string',
      'stringLivingPlace' => 'nullable|sometimes|alpha',
      'stringAdress' => 'nullable|sometimes|string',
      'dateBirthDate' => 'nullable|sometimes|date',
      'stringTelephoneNumber' => 'nullable|sometimes|string',
    ];
  }
}
