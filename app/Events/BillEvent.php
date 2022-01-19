<?php

namespace App\Events;

use App\Models\Bill;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BillEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message, $created_at, $class_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Bill $bill)
    {
        $this->message = 'Bill <i>' . $bill->bill_no . '</i> has been created';
        $this->class_name = Bill::class;
        $this->created_at = getTimeNotification($bill->created_at);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('channel-bill');
    }

    public function broadcastAs()
    {
        return 'event-bill';
    }
}
