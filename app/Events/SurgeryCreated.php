<?php

namespace HUAC\Events;

use HUAC\Models\Surgery;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\Channel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SurgeryCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Surgery
     */
    public $surgery;

    /**
     * Create a new event instance.
     *
     * @param Surgery $surgery
     */
    public function __construct(Surgery $surgery)
    {
        $this->surgery = $surgery;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel
     */
    public function broadcastOn()
    {
        return new Channel('surgery-created');
    }

    public function broadcastAs()
    {
        return 'surgery-created';
    }
}
