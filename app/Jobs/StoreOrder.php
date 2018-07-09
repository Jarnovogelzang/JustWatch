<?php

namespace App\Jobs;

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
  protected $arrayData;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(array $arrayData) {
    $this->arrayData = $arrayData;
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
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $objOrder = Order::create($this->getArrayData());
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
}
