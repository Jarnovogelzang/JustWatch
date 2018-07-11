<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ErrorException extends Notification implements ShouldQueue {
  use Queueable;

  /**
   * @var mixed
   */
  protected $objException;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Exception $objException) {
    $this->objException = $objException;
  }

  /**
   * Get the value of objException
   *
   * @return  mixed
   */
  public function getObjException() {
    return $this->objException;
  }

  /**
   * Set the value of objException
   *
   * @param  mixed  $objException
   *
   * @return  self
   */
  public function setObjException($objException) {
    $this->objException = $objException;

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
      'mail',
    ];
  }

  /**
   * @param $notifiable
   * @return mixed
   */
  public function toDatabase($notifiable) {
    return [
      'stringData' => $this->getObjException()->toString(),
      'stringMessage' => $this->getObjException()->getMessage(),
      'stringTrace' => $this->getObjException()->getTraceAsString(),
      'stringFile' => $this->getObjException()->getFile(),
    ];
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
