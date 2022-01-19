<?php

namespace App\Notifications;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BillNotification extends Notification
{
    use Queueable;

    public $bill, $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
        $this->message = 'Bill ' . $this->bill->bill_no . ' just created';
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
            ->greeting('Hello ' . $this->bill->getCustomer->name . '!')
            ->line('This is an automatic notification.')
            ->line('Thank you for ordering from our website. Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.')
            ->line('Your track number is: ' . $this->bill->bill_no)
            ->action('Track order', url('/'))
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
            'id' => $this->bill->bill_no,
            'message' => $this->message,
            'created_at' => getTimeNotification($this->bill->created_at)
        ];
    }
}
