<?php

namespace App\Http\Requests\DiscountCodes;

use Illuminate\Foundation\Http\FormRequest;

class EditDiscountCodeRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('edit', $this->route('objDiscountCode'));
  }
}
