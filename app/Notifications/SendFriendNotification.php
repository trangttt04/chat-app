<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Notifications\Notification;

class SendFriendNotification extends Notification
{
    use Queueable;

    protected $user;
    protected $message;
    protected $type;
    public function __construct($user, $message, $type)
    {
        $this->user = $user;
        $this->message = $message;
        $this->type = $type;
    }


    public function via(object $notifiable): array
    {
        return ['database','broadcast'];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'username' => $this->user->name,
            'avatar' => $this->user->avatar,
            'message' => $this->message,
            'type' => $this->type,
        ]);
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'username' => $this->user->name,
            'avatar' => $this->user->avatar,
            'message' => $this->message,
            'type' => $this->type,
        ];
    }
}
