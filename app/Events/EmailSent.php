<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EmailSent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $mail;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$mail)
    {
        $this->mail = "{$mail} has been sent";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
            return ['Email-sent'];
        // return new PrivateChannel('channel-name');
    }
}
