<?php

namespace App\Http\Requests\PriceRanges;

use Illuminate\Foundation\Http\Request;

class ShowPriceRangeRequest extends Request {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('show', $this->route('objPriceRange'));
  }
}
