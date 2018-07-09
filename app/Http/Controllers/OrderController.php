<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Http\Requests\Orders\EditOrderRequest;
use App\Http\Requests\Orders\ShowOrderRequest;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Jobs\CreateOrder;
use App\Jobs\NotifyUser;
use App\Jobs\StoreOrder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller {
  /**
   * @param CreateOrderRequest $objRequest
   */
  public function create(CreateOrderRequest $objRequest) {
    Log::info('Showing the form for creating an order.');

    return view('orders.create');
  }

  /**
   * @param DeleteOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function delete(DeleteOrderRequest $objRequest, Order $objOrder) {
    Log::critical('Deleting order with information as: ' . implode(', ', $objOrder->toArray()) . '.');

    return redirect()
      ->back()
      ->with($objOrder->delete() ? [
        'stringSuccess' => 'Order succesvol verwijderd!',
      ] : [
        'stringError' => 'Order onsuccesvol verwijderd!',
      ]);
  }

  /**
   * @param EditOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function edit(EditOrderRequest $objRequest, Order $objOrder) {
    Log::info('Show edit-form for order with ID: ' . $objOrder->getIntId());

    return view('orders.edit')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  public function index() {
    Log::info('Show all orders for user with ID: ' . auth()->user()->getIntId() . '.');

    return view('orders.index')
      ->with([
        'arrayOrders' => Order::all(),
      ]);
  }

  /**
   * @param PayOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function pay(PayOrderRequest $objRequest, Order $objOrder) {
    Log::critical('Paying order with ID: ' . $objOrder->getIntId() . '.');

    UpdateOrder::dispatch($objOrder, [
      'boolIsPaid' => true,
    ])->delay(now());

    NotifyUser::dispatch($objOrder->getUser(), new OrderPaid($objOrder));

    return view('orders.show')
      ->with([
        'objOrder' => $objOrder,
        'stringSucces' => 'Bestelling succesvol geplaatst! U ontvangt zo spoedig mogelijk een mail met informatie over de vervolgprocedure van ons! U kunt uw bestelling bekijken via Mijn Bestellingen!',
      ]);
  }

  /**
   * @param ShowOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function show(ShowOrderRequest $objRequest, Order $objOrder) {
    Log::info('Show order with ID: ' . $objOrder->getIntId() . '.');

    return view('orders.show')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  /**
   * @param StoreOrderRequest $objRequest
   */
  public function store(StoreOrderRequest $objRequest) {
    Log::info('Storing a new order.');

    StoreOrder::dispatch([
      'teset' => 'test',
    ])->delay(now());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Bestelling succesvol aangemaakt!',
      ]);
  }

  /**
   * @param UpdateOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function update(UpdateOrderRequest $objRequest, Order $objOrder) {
    Log::info('Updating order with ID: ' . $objOrder->getIntId() . '.');

    $objOrder = $objOrder->update($objRequest->all());

    return redirect()
      ->back()
      ->with([
        'stringSuccess' => 'Bestelling succesvol aangepast!',
        'objOrder' => $objOrder,
      ]);
  }
}
