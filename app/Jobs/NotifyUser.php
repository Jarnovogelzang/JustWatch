<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NotifyUser implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var mixed
   */
  protected $objNotification;

  /**
   * @var mixed
   */
  protected $objUser;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(User $objUser, Notification $objNotification) {
    $this->objUser = $objUser;
    $this->objNotification = $objNotification;
  }

  /**
   * Get the value of objNotification
   *
   * @return  mixed
   */
  public function getObjNotification() {
    return $this->objNotification;
  }

  /**
   * Get the value of objUser
   *
   * @return  mixed
   */
  public function getObjUser() {
    return $this->objUser;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    $this->getObjUser()->notify($this->getObjNotification());
  }

  /**
   * Set the value of objNotification
   *
   * @param  mixed  $objNotification
   *
   * @return  self
   */
  public function setObjNotification($objNotification) {
    $this->objNotification = $objNotification;

    return $this;
  }

  /**
   * Set the value of objUser
   *
   * @param  mixed  $objUser
   *
   * @return  self
   */
  public function setObjUser($objUser) {
    $this->objUser = $objUser;

    return $this;
  }
}
