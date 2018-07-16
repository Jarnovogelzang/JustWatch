<?php

namespace App\Listeners\Orders;

use App\Events\Orders\OrderPaid;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdminOrderPaidNotification implements ShouldQueue {
  /**
   * Handle a job failure.
   *
   * @param  \App\Events\OrderShipped  $event
   * @param  \Exception  $exception
   * @return void
   */
  public function failed(OrderPaid $objEvent, Exception $objException) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objException));
  }

  /**
   * Handle the event.
   *
   * @param  OrderStored  $event
   * @return void
   */
  public function handle(OrderPaid $objEvent) {
    $objEvent->getObjOrder()->getUser()->notify(new OrderPaidToAdmin($objEvent->getObjOrder()));
  }
}
