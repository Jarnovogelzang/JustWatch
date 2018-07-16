<?php

namespace App\Http\Controllers;

use App\Http\Requests\Orders\CreateOrderRequest;
use App\Http\Requests\Orders\DeleteOrderRequest;
use App\Http\Requests\Orders\EditOrderRequest;
use App\Http\Requests\Orders\ShowOrderRequest;
use App\Http\Requests\Orders\StoreOrderRequest;
use App\Http\Requests\Orders\UpdateOrderRequest;
use App\Jobs\CreateOrder;
use App\Jobs\StoreOrder;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller {
  /**
   * @param CheckOutOrderRequest $objRequest
   * @param Order $objOrder
   * @param MollieDataMover $objDataMover
   */
  public function checkout(CheckOutOrderRequest $objRequest, Order $objOrder, MollieDataMover $objDataMover) {
    return redirect()
      ->to($objDataMover->storePayment($objOrder)['self']['_links']['href']);
  }

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

    return view('orders.edit');
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

    event(new OrderPaid($objOrder->update([
      'boolIsPaid' => true,
    ])->save()));

    return view('orders.show')
      ->with([
        'stringSucces' => 'Bestelling succesvol geplaatst! U ontvangt zo spoedig mogelijk een mail met informatie over de vervolgprocedure van ons! U kunt uw bestelling bekijken via Mijn Bestellingen!',
      ]);
  }

  /**
   * @param ShowOrderRequest $objRequest
   * @param Order $objOrder
   */
  public function show(ShowOrderRequest $objRequest, Order $objOrder) {
    Log::info('Showing an Order with ID as ' . $objOrder->getIntId() . '.');

    return view('orders.show');
  }

  /**
   * @param StoreOrderRequest $objRequest
   */
  public function store(StoreOrderRequest $objRequest) {
    Log::info('Storing an new Order.');

    event(new OrderStored($objOrder = Order::create($objRequest->all())));

    return redirect()
      ->back()
      ->with([
        'stringSucces' => 'Order succesfully stored!',
      ]);
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
