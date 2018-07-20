@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => 'DiscountCodeController@index', 'method' => 'GET']);?>
      <div class="form-group text-center">
        <label>Titel:</label>
        <div class="col-md-12">
          <?=Form::text('stringDiscountCode', request()->has('stringDiscountCode') ? request()->query('stringDiscountCode') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>DiscountType: </label>
        <div class="col-md-12">
          <?=Form::select('enumDiscountType', ['DISCOUNT_AMOUNT' => 'Vast Bedrag', 'DISCOUNT_PERCENTAGE' => 'Percentage'], request()->has('enumDiscountType') ? request()->query('enumDiscountType') : null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Hoeveelheid Korting: </label>
        <div class="col-md-12">
          <?=Form::number('floatDiscount', request()->has('floatDiscount') ? request()->query('floatDiscount') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Opslaan: </label>
        <div class="col-md-12">
          <?=Form::submit('Opslaan', ['class' => 'btn btn-default', 'style' => 'width:100%;']);?>
        </div>
      </div>
    <?=Form::open();?>
  </div>
  <div class="form-group text-center">
    <table>
      <thead>
        <th>ID</th>
        <th>Titel</th>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script async defer src="<?=asset('js/orders/all.js');?>"></script>
@endsection