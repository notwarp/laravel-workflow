<?php

namespace LucaTerribili\LaravelWorkflow\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class WorkflowStart
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $model;

    /**
     * Create a new event instance.
     *
     * @param mixed $model
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->model = $model;
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
