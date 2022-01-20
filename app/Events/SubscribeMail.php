<?php

namespace App\Events;

use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $afterCommit = true;

    public $_subscriber, $message, $created_at, $class_name;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->_subscriber = $subscriber;
        $this->message = 'Email <i>' . $subscriber->email . '</i> just subscribe receive notification';
        $this->class_name = Subscriber::class;
        $this->created_at = getTimeNotification($subscriber->created_at);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PresenceChannel('channel-subscribe-email');
        return new Channel('channel-subscribe-email');
        // return new PrivateChannel('channel-subscribe-email');
    }

    public function broadcastAs()
    {
        return 'event-subscribe-email';
    }
}
