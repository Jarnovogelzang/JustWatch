<?php

namespace App\Observers;

class SystemObserver {
  /**
   * @var mixed
   */
  protected $objModel;

  /**
   * @param Model $objModel
   */
  public function created(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' created at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function creating(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' creating at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function deleted(Model $objModel) {
    Log::critical('Model with data AS ' . json_encode($objModel->toArray()) . ' deleted at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.')));
  }

  /**
   * @param Model $objModel
   */
  public function deleting(Model $objModel) {
    Log::critical('Model with data AS ' . json_encode($objModel->toArray()) . ' deleting at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
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
   * @param Model $objModel
   */
  public function restored(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' restored at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function restoring(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' restoring at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function retrieved(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' retrieved at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function saved(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' saved at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function saving(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' saving at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
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

  /**
   * @param Model $objModel
   */
  public function updated(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' updated at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }

  /**
   * @param Model $objModel
   */
  public function updating(Model $objModel) {
    Log::info('Model with data AS ' . json_encode($objModel->toArray()) . ' updating at ' . Carbon::now()->toDateTimeString() . (Auth::check() ? ' by user with data AS ' . Auth::user()->toArray() : '.'));
  }
}