<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotPaid extends Notification {
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
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable) {
    return [
      //
    ];
  }

  /**
   * @param $notifiable
   * @return mixed
   */
  public function toDatabase($notifiable) {
    return $this->getObjOrder->toArray();
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable) {
    return (new MailMessage)
      ->line('The introduction to the notification.')
      ->action('Notification Action', url('/'))
      ->line('Thank you for using our application!');
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable) {
    return [
      'mail',
    ];
  }
}
