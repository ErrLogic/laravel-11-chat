<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth as AuthLogin;

class Auth extends Component
{
    public string $email;
    public string $password;

    public function login()
    {
        if (AuthLogin::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->redirectRoute('contact');
        }
    }

    public function render()
    {
        return view('livewire.auth');
    }
}
