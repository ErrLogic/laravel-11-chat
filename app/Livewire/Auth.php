<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Auth as AuthLogin;

class Auth extends Component
{
    use LivewireAlert;

    public string $email;
    public string $password;

    public function login()
    {
        if (AuthLogin::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->redirectRoute('contact');
        } else {
            $this->alert('error', 'Unauthorized');
        }
    }

    public function render()
    {
        return view('livewire.auth');
    }
}
