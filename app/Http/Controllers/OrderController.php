<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Http\Requests\Orders\EditOrderRequest;
use App\Http\Requests\Orders\ShowOrderRequest;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;

class OrderController extends Controller {
  public function index() {
    return view('orders.index')
      ->with([
        'arrayOrders' => Order::all(),
      ]);
  }

  public function show(ShowOrderRequest $objRequest, Order $objOrder) {
    return view('orders.show')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  public function create(CreateOrderRequest $objRequest) {
    return view('orders.create');
  }

  public function edit(EditOrderRequest $objRequest, Order $objOrder) {
    return view('orders.edit')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  public function update(UpdateOrderRequest $objRequest, Order $objOrder) {
    $objOrder = $objOrder->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Bestelling succesvol aangepast!',
        'objOrder' => $objOrder,
      ]);
  }

  public function store(StoreOrderRequest $objRequest) {
    $objOrder = Order::create($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Bestelling succesvol aangemaakt!',
      ]);
  }

  public function delete(DeleteOrderRequest $objRequest, Order $objOrder) {
    $objOrder->delete();

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Bestelling succesvol verwijderd!',
      ]);
  }
}
