@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group">
    <label>Titel: </label>
    <div class="col-md-12">
      <?=Form::select('intUserId', null, null, ['class' => 'form-control', 'readonly' => 'readonly']);?>
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
<script async defer src="<?=asset('/js/orders/logic.js');?>"></script>
@endsection