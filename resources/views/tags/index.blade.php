@extends('layouts.admin.main')

@section('content')
<div class="container">
  <div class="form-group text-center">
    <?=Form::open(['action' => 'TagController@index', 'method' => 'GET']);?>
      <div class="form-group text-center">
        <label>Specificatie:</label>
        <div class="col-md-12">
          <?=Form::text('stringKey', request()->has('stringKey') ? request()->query('stringKey') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Waarde:</label>
        <div class="col-md-12">
          <?=Form::text('stringValue', request()->has('stringValue') ? request()->query('stringValue') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Product:</label>
        <div class="col-md-12">
          <?=Form::select('intProductId', null, request()->has('intProductId') ? request()->query('intProductId') : null, ['class' => 'form-control']);?>
        </div>
      </div>
      <div class="form-group text-center">
        <label>Opslaan: </label>
        <div class="col-md-12">
          <?=Form::submit('Opslaan', ['class' => 'btn btn-default', 'style' => 'width:100%;']);?>
        </div>
      </div>
    <?=Form::close();?>
  </div>
  <div class="form-group text-center">
    <table>
      <thead>
        <th>Tag</th>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
<script async defer src="<?=asset('js/specificationss/all.js');?>"></script>
@endsection