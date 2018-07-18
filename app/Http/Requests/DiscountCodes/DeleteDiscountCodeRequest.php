<?php

namespace App\Http\Requests\DiscountCodes;

use Illuminate\Foundation\Http\FormRequest;

class DeleteDiscountCodeRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('destroy', $this->route('objDiscountCode'));
  }
}
