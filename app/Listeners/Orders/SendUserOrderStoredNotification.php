<?php

namespace App\Listeners\Orders;

use App\Events\Orders\OrderStored;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserOrderStoredNotification implements ShouldQueue {
  /**
   * Handle a job failure.
   *
   * @param  \App\Events\OrderShipped  $event
   * @param  \Exception  $exception
   * @return void
   */
  public function failed(OrderStored $objEvent, Exception $objException) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objException));
  }

  /**
   * Handle the event.
   *
   * @param  OrderStored  $event
   * @return void
   */
  public function handle(OrderStored $objEvent) {
    $objEvent->getObjOrder()->getUser()->notify(new OrderStoredToUser($objEvent->getObjOrder()));
  }
}
