<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QueryNotiEn extends Notification
{
    use Queueable;
    private $feed;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($feed)
    {
        $this->feed=$feed;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('email.welcome1.title'))
            ->greeting(__('email.welcome1.dear').$this->feed['name'])
                    ->line(__('email.welcome1.line1'))
                    ->line(__('email.welcome1.line2'))
                    ->line(__('email.welcome1.line3'))
                    ->line(__('email.welcome1.line4'))
                    ->line(__('email.welcome1.line5'))
                    ->line(__('email.welcome1.thanks'))
                    ->line(__('email.welcome1.regards'))
                    ->line(__('email.welcome1.company'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
