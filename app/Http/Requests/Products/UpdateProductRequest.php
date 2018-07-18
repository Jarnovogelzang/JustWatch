<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('update', $this->route('objProduct'));
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'stringTitle' => 'required|string',
      'stringDescription' => 'required|string',
      'floatPrice' => 'required|numeric',
      'intAliId' => 'nullable|numeric|integer',
      'arraySpecifications' => 'nullable|array',
    ];
  }
}
