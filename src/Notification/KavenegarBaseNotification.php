<?php

namespace Kavenegar\Laravel\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kavenegar\Laravel\Message\KavenegarMessage;

abstract class KavenegarBaseNotification extends Notification
{

    /**
     * The notification's delivery channels.
     * other channels: mail, database, broadcast, nexmo, slack, and custom channels
     *
     * @var array
     */
    public array $drivers = [];

    /**
     * Get the notification's delivery channel.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return array_merge($this->drivers, ['kavenegar']);
    }

    /**
     * Get the kavenegar representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Kavenegar\Laravel\Message\KavenegarMessage
     */
    abstract public function toKavenegar($notifiable): KavenegarMessage;

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
