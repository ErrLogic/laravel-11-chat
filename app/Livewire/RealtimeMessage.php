<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\User;
use Livewire\Component;
use App\Models\ChatRoom;
use Livewire\Attributes\On;
use App\Events\SendRealtimeMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class RealtimeMessage extends Component
{
    use LivewireAlert;

    public string $roomId;
    public string $message = '';
    public string $status;
    public string $friendStatus;
    public string $friendName;

    public function __construct()
    {
        $this->status = 'Offline';
        $this->friendStatus = 'Offline';
    }

    public function getListeners()
    {
        return [
            "echo-presence:channel.{$this->roomId},SendRealtimeMessage" => 'handleSendMessage',
            "echo-presence:channel.{$this->roomId},here" => 'handleHere',
            "echo-presence:channel.{$this->roomId},joining" => 'handleJoining',
            "echo-presence:channel.{$this->roomId},leaving" => 'handleLeaving',
        ];
    }

    public function triggerEvent(): void
    {
        if ($this->message != '') {
            $userId = auth()->user()->id;
            event(new SendRealtimeMessage($this->message, $this->roomId, $userId));

            $this->message = '';
        } else {
            $this->alert('error', 'Fill the message');
        }
    }

    public function handleSendMessage($event): void
    {
        if ($event['userId'] === auth()->user()->id) {
            $chat = Chat::create([
                'chat_room_id' => $event['roomId'],
                'user_id' => $event['userId'],
                'message' => $event['message'],
            ]);

            $this->alert('success', 'Message sent');
        } else {
            $this->alert('success', 'New message: ' . $event['message']);
        }
    }

    public function handleHere($event): void
    {
        foreach ($event as $user) {
            if ($user['id'] != auth()->user()->id) {
                $this->friendStatus = 'Online';
                $this->friendName = $user['name'];
            }
        }

        $this->status = 'Online';
    }

    public function handleJoining($event): void
    {
        $this->friendStatus = 'Online';
        $this->friendName = $event['name'];
    }

    public function handleLeaving($event): void
    {
        $this->friendStatus = 'Offline';
        $this->friendName = $event['name'];
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        $this->redirectRoute('login');
    }

    public function back()
    {
        $this->redirectRoute('contact');
    }

    public function render()
    {
        return view('livewire.realtime-message');
    }
}
