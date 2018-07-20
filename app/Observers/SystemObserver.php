<?php

namespace App\Observers;

class SystemObserver {
  /**
   * @param Model $objModel
   */
  public function created(Model $objModel) {
    Log::info('Model Created.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateCreatedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function creating(Model $objModel) {
    Log::info('Model Creating.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateCreatedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function deleted(Model $objModel) {
    Log::critical('Model Deleted.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateDeletedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function deleting(Model $objModel) {
    Log::critical('Model Deleting.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateDeletedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function restored(Model $objModel) {
    Log::info('Model Restored.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateRestoredAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function restoring(Model $objModel) {
    Log::info('Model Restoring.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateRestoredAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function retrieved(Model $objModel) {
    Log::info('Model Retrieved.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateRetrievedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function saved(Model $objModel) {
    Log::info('Model Saved.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateSavedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function saving(Model $objModel) {
    Log::info('Model Saving.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateSavingAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function updated(Model $objModel) {
    Log::info('Model Updated.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateUpdatedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }

  /**
   * @param Model $objModel
   */
  public function updating(Model $objModel) {
    Log::info('Model Updating.', [
      'objModel' => $objModel->toArray(),
      'objUser' => Auth::check() ? Auth::user()->toArray() : null,
      'dateUpdatedAt' => Carbon::now()->toDateTimeString(),
    ]);
  }
}