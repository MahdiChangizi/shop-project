<?php

namespace App\Notifications;

use GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CodeNotification extends Notification
{
    use Queueable;
    protected $code;
    protected $mobile;


    public function __construct($code, $mobile)
    {
        $this->code = $code;
        $this->mobile = $mobile;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [GhasedakChannel::class];
    }


    public function toGhasedakSms($notifiable)
    {
        return [
            'text' => "کد احراز هویت {$this->code} وب سایت آمازون",
            'mobile' => $this->mobile
        ];
    }

}
