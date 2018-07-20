@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => ['DiscountCodeController@update', null], 'method' => 'POST']);?>
      <div class="form-group">
        <label>Prijs - Laag: </label>
        <div class="col-md-6">
          <?=Form::text('floatPriceLow', null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Prijs - Hoog: </label>
        <div class="col-md-6">
          <?=Form::text('floatPriceHigh', null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Prijs - Eigenlijk: </label>
        <div class="col-md-12">
          <?=Form::text('floatPriceActual', null, ['class' => 'form-control', 'required' => 'required']);?>
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
</div>
@endsection

@section('script')
<script async defer src="<?=asset('/js/priceranges/logic.js');?>"></script>
@endsection