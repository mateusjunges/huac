<?php

namespace HUAC\Events;

use HUAC\Models\Surgery;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SurgeryRemovedFromWaitingList implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

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
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('surgery-removed-from-waiting-list');
    }

    public function broadcastAs()
    {
        return 'surgery-removed-from-waiting-list';
    }
}
