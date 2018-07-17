@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group">
    <label>Titel: </label>
    <div class="col-md-12">
      <?=Form::text('stringTitle', $objPriceRange->getStringTitle(), ['class' => 'form-control']);?>
    </div>
  </div>
</div>
@endsection