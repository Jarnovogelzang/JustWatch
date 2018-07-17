@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['OrderController@store'], 'method' => 'POST']);?>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::number('intUserId', null, ['class' => 'form-control', 'required' => 'required']);?>
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