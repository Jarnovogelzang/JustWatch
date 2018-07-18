@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['ProductController@store'], 'method' => 'POST']);?>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringTitle', null, ['class' => 'form-control', 'required' => 'required']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Prijs: </label>
      <div class="col-md-12">
        <?=Form::number('floatPrice', null, ['class' => 'form-control', 'required' => 'required']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Beschrijving: </label>
      <div class="col-md-12">
        <?=Form::text('stringDescription', null, ['class' => 'form-control', 'required' => 'required']);?>
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
<script async defer src="<?=asset('js/products/create.js');?>"></script>
@endsection