<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreModel implements ShouldQueue {
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
   * The job failed to process.
   *
   * @param  Exception  $objException
   * @return void
   */
  public function failed(Exception $objException) {
    Notification::send(User::whereIsAdmin()->get(), new ErrorException($objException));
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
    $this->getObjModel()::create($this->getArrayData());
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
