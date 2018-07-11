<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class NotifyUsers implements ShouldQueue {
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * @var mixed
   */
  private $arrayUsers;

  /**
   * @var mixed
   */
  private $objNotification;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct(array $arrayUsers, Notification $objNotification) {
    $this->arrayUsers = $arrayUsers;
    $this->objNotification = $objNotification;
  }

  /**
   * Get the value of arrayUsers
   */
  public function getArrayUsers() {
    return $this->arrayUsers;
  }

  /**
   * Get the value of objNotification
   */
  public function getObjNotification() {
    return $this->objNotification;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle() {
    Notification::send($this->getArrayUsers(), $this->getObjNotification());
  }

  /**
   * Set the value of arrayUsers
   *
   * @return  self
   */
  public function setArrayUsers($arrayUsers) {
    $this->arrayUsers = $arrayUsers;

    return $this;
  }

  /**
   * Set the value of objNotification
   *
   * @return  self
   */
  public function setObjNotification($objNotification) {
    $this->objNotification = $objNotification;

    return $this;
  }
}
