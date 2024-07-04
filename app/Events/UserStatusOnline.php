<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UserStatusOnline implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public function __construct($user)
    {
        $this->user = $user;
        Log::debug('user.online.1');
    }

    public function broadcastOn()
    {
        return new PresenceChannel('online');
    }

    public function broadcastWith():array
    {
        return [
            'data' => $this->user,
        ];
    }
}
