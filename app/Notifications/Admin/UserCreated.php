<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreated extends Notification implements ShouldQueue {
  use Queueable;

  /**
   * @var mixed
   */
  protected $objUser;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(User $objUser) {
    $this->objUser = $objUser;
  }

  /**
   * Get the value of objUser
   */
  public function getObjUser() {
    return $this->objUser;
  }

  /**
   * Set the value of objUser
   *
   * @return  self
   */
  public function setObjUser($objUser) {
    $this->objUser = $objUser;

    return $this;
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $objNotification
   * @return array
   */
  public function toArray($objNotification) {
    return $this->getObjUser()->toArray();
  }

  /**
   * @param $objNotification
   * @return mixed
   */
  public function toDatabase($objNotification) {
    return [
      'intId' => $this->getObjUser()->getIntId(),
    ];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $objNotification
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($objNotification) {
    return (new MailMessage)
      ->line('The introduction to the notification.')
      ->action('Notification Action', url('/'))
      ->line('Thank you for using our application!');
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $objNotification
   * @return array
   */
  public function via($objNotification) {
    return ['mail'];
  }
}
