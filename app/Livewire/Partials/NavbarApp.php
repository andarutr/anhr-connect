<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NavbarApp extends Component
{
    public $name = '';
    
    public $old_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';
    public $showChangePasswordModal = false;

    public function mount()
    {
        $this->name = Auth::user()->name ?? 'Guest';
    }

    public function render()
    {
        return view('livewire.partials.navbar-app');
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function openChangePasswordModal()
    {
        $this->resetPasswordFields();
        $this->showChangePasswordModal = true;
        $this->dispatch('showChangePasswordModal');
    }

    public function closeChangePasswordModal()
    {
        $this->showChangePasswordModal = false;
        $this->resetPasswordFields();
        $this->dispatch('closeChangePasswordModal');
    }

    public function updatePassword()
    {
        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required'
        ], [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal 8 karakter.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->old_password, $user->password)) {
            $this->addError('old_password', 'Password lama tidak cocok.');
            return;
        }

        if (Hash::check($this->new_password, $user->password)) {
            $this->addError('new_password', 'Password baru tidak boleh sama dengan password lama.');
            return;
        }

        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        // Tutup modal setelah sukses
        $this->dispatch('closeChangePasswordModal');
        $this->resetPasswordFields();
        
        session()->flash('message', 'Password berhasil diubah.');
    }

    private function resetPasswordFields()
    {
        $this->old_password = '';
        $this->new_password = '';
        $this->new_password_confirmation = '';
        $this->resetErrorBag();
    }
}
