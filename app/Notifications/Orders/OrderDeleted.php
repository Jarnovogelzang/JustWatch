<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderNotPaid extends Notification implements ShouldQueue {
  use Queueable;

  /**
   * @var mixed
   */
  protected $objOrder;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Order $objOrder) {
    $this->objOrder = $objOrder;
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

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $objNotification
   * @return array
   */
  public function toArray($objNotification) {
    return $this->getObjOrder()->toArray();
  }

  /**
   * @param $objNotification
   */
  public function toBroadcast($objNotification) {
    return new BroadcastMessage($this->getObjOrder()->toArray());
  }

  /**
   * @param $objNotification
   * @return mixed
   */
  public function toDatabase($objNotification) {
    return $this->getObjOrder()->toArray();
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
    return [
      'mail',
    ];
  }
}
