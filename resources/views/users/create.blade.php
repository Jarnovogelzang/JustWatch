@extends('layouts.app')

@section('content')
<div class="container">
  <?=Form::open(['action' => ['UserController@store'], 'method' => 'POST']);?>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringName', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringEmail', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringPassword', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringCountry', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringZipCode', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringLivingPlace', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringAdress', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::number('intHouseNumber', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('dateBirthDate', null, ['class' => 'form-control']);?>
      </div>
    </div>
    <div class="form-group">
      <label>Titel: </label>
      <div class="col-md-12">
        <?=Form::text('stringTelephoneNumber', null, ['class' => 'form-control']);?>
      </div>
    </div>
  <?=Form::close();?>
</div>
@endsection

@section('script')
<script async defer src="<?=asset('js/users/create.js');?>"></script>
@endsection