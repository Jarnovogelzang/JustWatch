@extends('layouts.admin.main')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => ['TagController@update'], 'method' => 'POST']);?>
      <div class="form-group">
        <label>Tag: </label>
        <div class="col-md-12">
          <?=Form::text('stringTag', null, ['class' => 'form-control', 'required' => 'required']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Producten: </label>
        <div class="col-md-12">
          <?=Form::select('arrayProducts', null, null, ['class' => 'form-control', 'required' => 'required']);?>
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
<script async defer src="<?=asset('js/tags/logic.js');?>"></script>
@endsection