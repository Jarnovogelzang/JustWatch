@extends('layouts.admin.main')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => ['SpecificationController@update'], 'method' => 'POST']);?>
      <div class="form-group">
        <label>Speficiatie: </label>
        <div class="col-md-12">
          <?=Form::text('stringKey', null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Waarde: </label>
        <div class="col-md-12">
          <?=Form::text('stringValue', null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Product: </label>
        <div class="col-md-12">
          <?=Form::select('intProductId', null, null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Opslaan: </label>
        <div class="col-md-12">
          <?=Form::submit('Opslaan', ['class' => 'btn btn-default', 'style' => 'width:100%;', 'required' => 'required']);?>
        </div>
      </div>
    <?=Form::close();?>
  </div>
</div>
@endsection

@section('script')
<script async defer src="<?=asset('js/specifications/logic.js');?>"></script>
@endsection