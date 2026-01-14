<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public $id = null;

    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|email|unique:users,email,' . 'id')]
    public $email = '';

    #[Validate('nullable|min:6')]
    public $password = '';

    #[Validate('required|in:0,1')]
    public $is_admin = 0;

    public function setUserData(User $user)
    {
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->is_admin = $user->is_admin;
        $this->password = '';
    }

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'password' => Hash::make($this->password),
        ]);
    }

    public function update()
    {
        $this->validate();

        $user = User::findOrFail($this->id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);
    }
}