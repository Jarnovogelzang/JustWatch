@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group text-center">
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
      <div class="form-gorup">
        <label>Bestellingen: </label>
        <div class="col-md-12">
          <?=Form::select('arrayOrders', [], null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Tags: </label>
        <div class="col-md-12">
          <?=Form::select('arrayTags', [], null, ['class' => 'form-control']);?>
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
<script async defer src="<?=asset('js/products/create.js');?>"></script>
@endsection