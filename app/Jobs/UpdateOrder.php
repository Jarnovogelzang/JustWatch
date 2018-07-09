<?php

namespace App\Jobs;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateOrder implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var mixed
   */
  protected $arrayData;

  /**
   * @var mixed
   */
  protected $objOrder;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Order $objOrder, array $arrayData) {
    //
  }

  /**
   * Get the value of arrayData
   *
   * @return  mixed
   */
  public function getArrayData() {
    return $this->arrayData;
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
    $this->getObjOrder()->update($this->getArrayData())->save();
  }

  /**
   * Set the value of arrayData
   *
   * @param  mixed  $arrayData
   *
   * @return  self
   */
  public function setArrayData($arrayData) {
    $this->arrayData = $arrayData;

    return $this;
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
