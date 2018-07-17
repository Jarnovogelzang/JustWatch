@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group">
    <label>KortingsCode: </label>
    <div class="col-md-12">
      <?=Form::text('stringDiscountCode', $objDiscountCode->getStringDiscountCode(), ['class' => 'form-control', 'readonly' => 'readonly']);?>
    </div>
  </div>
    <div class="form-group">
    <label>DiscountType: </label>
    <div class="col-md-12">
      <?=Form::select('enumDiscountType', ['DISCOUNT_AMOUNT' => 'Vast Bedrag', 'DISCOUNT_PERCENTAGE' => 'Percentage'], $objDiscountCode->getEnumDiscountType(), ['class' => 'form-control', 'readonly' => 'readonly']);?>
    </div>
  </div>
  <div class="form-group">
    <label>Hoeveelheid Korting: </label>
    <div class="col-md-12">
      <?=Form::number('floatDiscount', $objDiscountCode->getFloatDiscount(), ['class' => 'form-control', 'readonly' => 'readonly']);?>
    </div>
  </div>
  <div class="form-group">
    <label>Opslaan: </label>
    <div class="col-md-12">
      <?=Form::submit('Opslaan', ['class' => 'btn btn-default', 'style' => 'width:100%;']);?>
    </div>
  </div>
</div>
@endsection