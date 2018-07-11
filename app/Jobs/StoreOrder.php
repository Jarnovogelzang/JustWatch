<?php

namespace App\Jobs;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreOrder implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var mixed
   */
  protected $objOrder;

  /**
   * @param Order $objOrder
   */
  public function __construct(Order $objOrder) {
    $this->arrayData = $arrayData;
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
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $objOrder = $this->getObjOrder()->save();
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
