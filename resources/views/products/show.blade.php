@extends('layouts.admin.main')

@section('content')
<div class="container">
  <div class="form-group">
    <label>Titel: </label>
    <div class="col-md-12">
      <?=Form::text('stringTitle', null, ['class' => 'form-control', 'readonly' => 'readonly']);?>
    </div>
  </div>
  <div class="form-group">
    <label>Prijs: </label>
    <div class="col-md-12">
      <?=Form::number('floatPrice', null, ['class' => 'form-control', 'readonly' => 'readonly']);?>
    </div>
  </div>
  <div class="form-group">
    <label>Beschrijving: </label>
    <div class="col-md-12">
      <?=Form::text('stringDescription', null, ['class' => 'form-control', 'readonly' => 'readonly']);?>
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

@section('script')
<script async defer src="<?=asset('/js/products/logic.js');?>"></script>
@endsection