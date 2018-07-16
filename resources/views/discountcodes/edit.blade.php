@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['DiscountController@update', $objDiscountCode], 'method' => 'PUT']);?>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringTitle', $objDiscountCode->getStringTitle(), ['class' => 'form-control']);?>
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