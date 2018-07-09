@extends('layouts.app')

@section('content')
<div>
    <?php foreach ($arrayFeaturedProducts as $objProduct): ?>
      <div>
        <?=$objProduct->getStringTitle() . $objProduct->getIntId() . $objProduct->getStringDescription();?>
      </div>
    <?php endforeach;?>
</div>
@endsection