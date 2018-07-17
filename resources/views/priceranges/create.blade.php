@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['DiscountCodeController@store'], 'method' => 'POST']);?>
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
    <<div class="form-group">
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
@endsection