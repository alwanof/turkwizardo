<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QueryAdminNoti extends Notification
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
      
        //
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
            ->subject('New Query from: '.$this->feed['name'])
            ->greeting('Dear Admins')
            ->line('New Query has been received with following details:')
                    ->line('Name: '.$this->feed['name'])
                    ->line('Email: '.$this->feed['email'])
                    ->line('Phone: '.$this->feed['phone'])
                    ->line('Service: '.$this->feed['service'])
                    ->line('Note: '.$this->feed['note'])
                    ->action('Page Link', $this->feed['url'])
                    ->line('Thank you for using our application!');
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
