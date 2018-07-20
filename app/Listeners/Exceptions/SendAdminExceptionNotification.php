<?php

namespace App\Listeners\Exceptinos;

use App\Events\Exceptions\ExceptionThrown;

class SendAdminExceptionNotification {
  /**
   * @var mixed
   */
  protected $objEvent;

  /**
   * @param ExceptionThrown $objEvent
   * @param Exception $objException
   */
  public function failed(ExceptionThrown $objEvent, Exception $objException) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objException));
  }

  /**
   * Handle the event.
   *
   * @param  ExceptionThrown  $event
   * @return void
   */
  public function handle(ExceptionThrown $objEvent) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objEvent->getObjException()));
  }
}
