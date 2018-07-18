<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return auth()->user()->can('store', $this->route('objOrder'));
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'intUserId' => 'required|integer|exists:User,intId',
      'intDiscountCodeId' => 'nullable|integer|exists:DiscountCode,intId',
      'arrayProducts' => 'nullable|array|exists:Product,intId',
    ];
  }
}
