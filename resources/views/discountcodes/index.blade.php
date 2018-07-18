@extends('layouts.app')

@section('content')
<div class="container">
  <table id="tableDiscountCodes">
    <thead>
      <th>ID</th>
      <th>Titel</th>
    </thead>
    <tbody></tbody>
  </table>
</div>
@endsection

@section('scripts')
<script async defer src="<?=asset('js/orders/all.js');?>"></script>
@endsection