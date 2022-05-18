<?php

namespace Kavenegar\Laravel\Notification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Kavenegar\Laravel\Channel\KavenegarChannel;
use Kavenegar\Laravel\Message\KavenegarMessage;

class KavenegarBaseNotification extends Notification
{

    /**
     * Get the notification's delivery channel.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['kavenegar'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Kavenegar\Laravel\Message\KavenegarMessage
     */
    public function toKavenegar($notifiable)
    {
        return new KavenegarMessage();
    }

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
