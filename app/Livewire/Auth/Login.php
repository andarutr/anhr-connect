<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Login extends Component
{
    public $email = '';
    public $password = '';

    #[Layout('components.layouts.auth')]
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = User::where('email', $this->email)->first();

            if($user->is_admin == 1)
            {
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/hrd');
            }
        } else {
            $this->addError('login', 'Email dan password salah');
        }
    }
}