<?php

namespace App\Notifications;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscribeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $_subscriber;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->_subscriber = $subscriber;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            ->line('The introduction to the notification.')
            ->line('You have successfully subscribe to receive email notifications')
            ->action('Visit my website', url('/'))
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
            'id' => $this->id,
            'message' => 'Email <i>' . $this->_subscriber->email . '</i> just subscribe your website',
            'created_at' => getTimeNotification($this->_subscriber->created_at)
        ];
    }
}
