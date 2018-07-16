<?php

namespace App\Events\Orders;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStored implements ShouldBroadcast {
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

  public function broadcastAs() {
    return 'Order.Stored';
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn() {
    return [
      new PrivateChannel('OrderPrivateChannel.' . $this->getObjOrder()->getIntId()),
    ];
  }

  /**
   * Determine if this event should broadcast.
   *
   * @return bool
   */
  public function broadcastWhen() {
    return Order::findOrFail($this->getObjOrder()->getIntId());
  }

  /**
   * @return mixed
   */
  public function broadcastWith() {
    return [
      'objOrder' => $this->getObjOrder()->toArray(),
    ];
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
