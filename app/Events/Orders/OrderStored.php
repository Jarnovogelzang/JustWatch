<?php

namespace App\Events\Orders;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStored {
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * @var mixed
   */
  protected $objOrder;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Order $objOrder) {
    $this->objOrder = $objOrder;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn() {
    return new PrivateChannel('channel-name');
  }

  /**
   * Get the value of objOrder
   *
   * @return  mixed
   */
  public function getObjOrder() {
    return $this->objOrder;
  }

  /**
   * Set the value of objOrder
   *
   * @param  mixed  $objOrder
   *
   * @return  self
   */
  public function setObjOrder($objOrder) {
    $this->objOrder = $objOrder;

    return $this;
  }
}
