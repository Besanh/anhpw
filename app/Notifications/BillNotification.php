<?php

namespace App\Notifications;

use App\Models\Bill;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BillNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $_bill;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->_bill = $bill;
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
            ->greeting('Hello ' . $this->_bill->getCustomer->name . '!')
            ->line('This is an automatic notification.')
            ->line('Thank you for ordering from our website. Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.')
            ->line('Your track number is: ' . $this->_bill->bill_no)
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
            'id' => $this->id,
            'bill_id' => $this->_bill->id,
            'message' => 'Bill ' . $this->_bill->bill_no . ' has been created',
            'created_at' => getTimeNotification($this->_bill->created_at)
        ];
    }
}
