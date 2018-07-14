<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateModel implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var mixed
   */
  protected $arrayData;

  /**
   * @var mixed
   */
  protected $objModel;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(Model $objModel, array $arrayData) {
    $this->objModel = $objModel;
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
   * Get the value of objModel
   *
   * @return  mixed
   */
  public function getObjModel() {
    return $this->objModel;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $this->getObjModel()->update($this->getArrayData())->save();
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
   * Set the value of objModel
   *
   * @param  mixed  $objModel
   *
   * @return  self
   */
  public function setObjModel($objModel) {
    $this->objModel = $objModel;

    return $this;
  }
}
