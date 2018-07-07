<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('edit', $this->route('objProduct'));
  }
}
