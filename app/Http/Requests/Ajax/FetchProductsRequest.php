<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FetchProductsRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return $this->ajax() && auth()->user() && auth()->user()->can('show', Product::class);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      //
    ];
  }
}
