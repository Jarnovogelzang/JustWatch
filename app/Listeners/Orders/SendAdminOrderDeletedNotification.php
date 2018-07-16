<?php

namespace App\Listeners\Orders;

class SendAdminOrderDeletedNotification {
  /**
   * Handle a job failure.
   *
   * @param  \App\Events\OrderShipped  $event
   * @param  \Exception  $exception
   * @return void
   */
  public function failed(OrderDeleted $objEvent, Exception $objException) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objException));
  }

  /**
   * Handle the event.
   *
   * @param  OrderStored  $event
   * @return void
   */
  public function handle(OrderDeleted $objEvent) {
    Notification::send(User::whereIsAdmin()->get(), new OrderStoredToAdmin($objEvent->getObjOrder()));
  }
}
