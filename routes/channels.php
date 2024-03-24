<?php

use App\Models\User;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('channel.{roomId}', function (User $user, int $roomId) {
    if ($user->canJoinRoom($roomId)) {
        return ['id' => $user->id, 'name' => $user->name];
    }
});