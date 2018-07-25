<?php

namespace App\Events\Exceptions;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use \Exception;

class ExceptionThrown implements ShouldBroadcast {
  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * @var mixed
   */
  protected $objException;

  /**
   * Create a new event instance.
   *
   * @return void
   */
  public function __construct(Exception $objException) {
    $this->objException = $objException;
  }

  public function broadcastAs() {
    return 'Exception.Thrown';
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return \Illuminate\Broadcasting\Channel|array
   */
  public function broadcastOn() {
    return [
      new PrivateChannel('ExceptionPrivateChannel'),
    ];
  }

  /**
   * Determine if this event should broadcast.
   *
   * @return bool
   */
  public function broadcastWhen() {
    return $this->getObjException();
  }

  /**
   * @return mixed
   */
  public function broadcastWith() {
    return [
      'objException' => $this->getObjException()->toArray(),
    ];
  }

  /**
   * Get the value of objException
   *
   * @return  mixed
   */
  public function getObjException() {
    return $this->objException;
  }

  /**
   * Set the value of objException
   *
   * @param  mixed  $objException
   *
   * @return  self
   */
  public function setObjException($objException) {
    $this->objException = $objException;

    return $this;
  }
}
