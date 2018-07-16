<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider {
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [
    'App\Events\Orders\OrderStored' => [
      'App\Listeners\Orders\SendUserOrderStoredNotification',
      'App\Listeners\Orders\SendAdminOrderStoredNotification',
    ],
    'App\Events\Orders\OrderPaid' => [
      'App\Listeners\Orders\SendUserOrderPaidNotification',
      'App\Listeners\Orders\SendAdminOrderPaidNotification',
    ],
    'App\Events\Orders\OrderDeleted' => [
      'App\Listeners\Orders\SendUserOrderDeletedNotification',
      'App\Listeners\Orders\SendAdminOrderDeletedNotification',
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot() {
    parent::boot();

    //
  }
}
