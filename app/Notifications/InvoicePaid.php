<?php

namespace App\Notifications;

use Awssat\Notifications\Messages\DiscordMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    private $invoice;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
//        return ['mail', 'database'];
        return ['mail', 'discord'];
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
//                    ->name($this->invoice['name'])
                    ->line($this->invoice['body'])
                    ->action($this->invoice['text'], $this->invoice['url'])
                    ->line($this->invoice['thanks']);
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
            'invoice_id' => $this->invoice['invoice_id']
        ];
    }

    public function toDiscord($notifiable) {
        return (new DiscordMessage)
            ->from('jimmy')
            ->content('testing123')
            ->embed(function ($embed) {
                $embed->title($this->invoice['name'])->description($this->invoice['body'])
                    ->field('Laravel', '9.0.0', true)
                    ->field('PHP', '8.0.0', true);
            });
    }
}
