<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate(['required', 'email'])]
    public $email;
    #[Validate(['required', 'min:8', 'max:255'])]
    public $password;

    public $error = false;

    public function login() {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        $this->addError('password', 'Incorrect username or password.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
