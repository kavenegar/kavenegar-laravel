<?php

namespace Kavenegar\Laravel;

use Illuminate\Notifications\Notification;
use Kavenegar\KavenegarApi;

class KavenegarChannel
{
    protected $api;

    /**
     * KavenegarChannel constructor.
     * @param KSP $api
     */
    public function __construct(KavenegarApi $api)
    {
        $this->api = $api;
    }

    /**
     * Send the given notification.
     *
     * @param  mixed $notifiable
     * @param  \Illuminate\Notifications\Notification $notification
     * @return void
     * @throws Exception
     */
    public function send($notifiable, Notification $notification)
    {
        $sender = config('services.kavenegar.sender');
        $receptor = $notifiable->routeNotificationFor('sms');
        $message = $notification->toSMS();

        $this->api->Send($sender, $receptor, $message);
    }

}