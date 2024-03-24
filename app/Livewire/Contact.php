<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ChatRoom;

class Contact extends Component
{
    public object $contacts;

    public function __construct()
    {
        $this->contacts = User::where('id', '<>', auth()->user()->id)->get();
    }

    public function chat($contact)
    {
        $findRoom = ChatRoom::where('participant',  auth()->user()->id . ':' . $contact['id'])
            ->orWhere('participant',   $contact['id'] . ':' . auth()->user()->id)
            ->first();

        if (!$findRoom) {
            $findRoom = ChatRoom::create([
                'participant' => auth()->user()->id . ':' . $contact['id']
            ]);
        }

        $this->redirectRoute('message', $findRoom->id);
    }

    public function render()
    {
        return view('livewire.contact');
    }
}
