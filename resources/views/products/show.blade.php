@extends('layouts.app')

@section('content')
<div>
  <?=$objProduct->getStringTitle();?>
  <?=$objProduct->getStringDescription();?>
  <table>
    <thead>
      <tr>
        <th>Specificatie</th>
        <th>Beschrijving</th>
      </tr>
    </thead>
      <tbody>
        <?php foreach ($objProduct->getSpecifications() as $objSpecification): ?>
          <tr>
            <td><?=$objSpecification->getStringKey();?></td>
            <td><?=$objSpecification->getStringValue();?></td>
          </tr>
        <?php endforeach;?>
      </tbody>
  </table>
</div>
@endsection