@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => 'ProductController@index', 'method' => 'GET']);?>
      <div class="form-group text-center">
        <label>Titel:</label>
        <div class="col-md-12">
          <?=Form::text('stringTitle', request()->has('stringTitle') ? request()->query('stringTitle') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Is Aanbevolen: </label>
        <div class="col-md-12">
          <?=Form::checkbox('boolIsFeatured', request()->has('boolIsFeatured') ? request()->query('boolIsFeatured') : null, true, ['class' => 'form-control']);?>
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