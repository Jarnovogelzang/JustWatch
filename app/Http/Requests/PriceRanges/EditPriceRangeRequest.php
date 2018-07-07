<?php

namespace App\Http\Requests\PriceRanges;

use Illuminate\Foundation\Http\FormRequest;

class EditPriceRangeRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('edit', $this->route('objPriceRange'));
  }
}
