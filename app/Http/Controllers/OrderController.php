<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Http\Requests\Orders\EditOrderRequest;
use App\Http\Requests\Orders\ShowOrderRequest;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Includes\Mollie\MollieDataMover;
use App\Jobs\CreateOrder;
use App\Jobs\NotifyUser;
use App\Jobs\StoreOrder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller {
  /**
   * @param CreateOrderRequest $objRequest
   */
  public function create(CreateOrderRequest $objRequest) {
    Log::info('Creating an new Order.');

    return view('orders.create');
  }

  /**
   * @param DeleteOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function delete(DeleteOrderRequest $objRequest, Order $objOrder) {
    Log::critical('Deleting an Order with ID as ' . $objOrder->getIntId() . '.');

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
    Log::info('Editing an Order with ID as ' . $objCategory->getIntId() . '.');

    return view('orders.edit')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  public function index() {
    Log::info('Showing all the Orders.');

    return view('orders.index');
  }

  /**
   * @param PayOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function pay(PayOrderRequest $objRequest, Order $objOrder) {
    Log::critical('Paying an Order with ID as ' . $objOrder->getIntId() . '.');

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
    Log::info('Showing an Order with ID as ' . $objOrder->getIntId() . '.');

    return view('orders.show')
      ->with([
        'objOrder' => $objOrder,
      ]);
  }

  /**
   * @param StoreOrderRequest $objRequest
   */
  public function store(StoreOrderRequest $objRequest) {
    Log::info('Storing an new Order.');

    $objOrder = new Order($objRequest->all());
    StoreOrder::dispatch($objOrder)->delay(now());

    if (auth()->user()->isAdmin()) {
      return view('orders.show')
        ->with([
          'objOrder' => $objOrder,
          'stringSuccess' => 'Order succesfully stored!',
        ]);
    }

    return redirect()
      ->to(MollieDataMover::getInstance()->postPayment($objOrder, [])['_links']['self']['href']);
  }

  /**
   * @param UpdateOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function update(UpdateOrderRequest $objRequest, Order $objOrder) {
    Log::info('Updating an Order with ID as ' . $objOrder->getIntId() . '.');

    return redirect()
      ->back()
      ->with($objOrder->update($objRequest->all()) ? [
        'stringSuccess' => 'Bestelling succesvol aangepast!',
      ] : [
        'stringError' => 'Bestelling onsuccesvol aangepast!',
      ]);
  }
}
