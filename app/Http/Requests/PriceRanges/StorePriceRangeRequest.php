<?php

namespace App\Http\Requests\PriceRanges;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceRangeRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('store', $this->route('objPriceRange'));
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'floatPriceLow' => 'required|float',
      'floatPriceHigh' => 'required|float',
      'floatPriceActual' => 'required|float',
    ];
  }
}
