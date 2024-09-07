<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate(['required', 'string', 'max:255'])]
    public $name;
    #[Validate(['required', 'email'])]
    public $email;
    #[Validate(['required', 'confirmed', 'min:8', 'max:255'])]
    public $password;
    public $password_confirmation;

    public function register() {
        $this->validate();

        $email_exists = User::where('email', $this->email)->first();

        if ($email_exists) {
            $this->addError('email', 'Email already exists');
            return;
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
