<?php

namespace App\Events;
use App\Models\Template;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StatusJobUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $template;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Template $template)
    {
        $this->template = $template;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}