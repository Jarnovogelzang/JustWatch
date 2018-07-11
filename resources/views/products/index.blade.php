@extends('layouts.app')

@section('content')
<div>
    <?php foreach ($arrayFeaturedCategories as $objCategory): ?>
      <div>
        <?=$objCategory->getStringTitle() . $objCategory->getIntId() . $objCategory->getStringDescription();?>
      </div>
    <?php endforeach;?>
</div>
@endsection