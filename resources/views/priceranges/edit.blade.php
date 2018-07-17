@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['DiscountCodeController@update', $objPriceRange], 'method' => 'POST']);?>
    <div class="form-group">
      <label>Prijs - Laag: </label>
      <div class="col-md-6">
        <?=Form::text('floatPriceLow', $objPriceRange->getFloatPriceLow(), ['class' => 'form-control', 'required' => 'required']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Prijs - Hoog: </label>
      <div class="col-md-6">
        <?=Form::text('floatPriceHigh', $objPriceRange->getFloatPriceHigh(), ['class' => 'form-control', 'required' => 'required']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Prijs - Eigenlijk: </label>
      <div class="col-md-12">
        <?=Form::text('floatPriceActual', $objPriceRange->getFloatPriceActual(), ['class' => 'form-control', 'required' => 'required']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Opslaan: </label>
      <div class="col-md-12">
        <?=Form::submit('Opslaan', ['class' => 'btn btn-default', 'style' => 'width:100%;']);?>
      </div>
    </div>
  <?=Form::close();?>
</div>
@endsection

@section('script')
<script async defer src="<?=asset('/js/priceranges/logic.js');?>"></script>
@endsection