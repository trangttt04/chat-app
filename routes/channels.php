<?php

use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\CRUD\FriendController;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('notification.friend.toggle.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('send.message.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('message.toggle.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('online.changed.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('online', function ($user) {
    if($user != null){
        return ['id' => $user->id];
    }
    return false;
});

