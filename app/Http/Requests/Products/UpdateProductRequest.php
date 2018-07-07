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
    return auth()->user() && auth()->user()->isAdmin();
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
      'floatPrice' => 'required',
      'intAliId' => 'nullable|sometimes|integer',
      'arraySpecifications' => 'nullable|sometimes|array',
    ];
  }
}
