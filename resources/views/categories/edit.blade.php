@extends('layouts.admin.main')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => '', 'method' => 'POST']);?>
      <div class="form-group">
        <label>Titel: </label>
        <div class="col-md-12">
          <?=Form::text('stringTitle', null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group">
        <label>Is Aanbevolen: </label>
        <div class="col-md-12">
          <?=Form::checkbox('boolIsFeatured', null, true, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-gorup">
        <label>Producten: </label>
        <div class="col-md-12">
          <?=Form::select('arrayProducts', [], null, ['class' => 'form-control']);?>
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
<script async defer src="<?=asset('/js/categories/logic.js');?>"></script>
@endsection