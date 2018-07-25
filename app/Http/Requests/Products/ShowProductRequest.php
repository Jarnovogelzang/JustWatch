<?php

namespace App\Http\Requests\Products;

use Illuminate\Http\Request;

class ShowProductRequest extends Request {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('show', $this->route('objProduct'));
  }
}
