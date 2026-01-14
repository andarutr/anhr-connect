<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Log;

class ManageUser extends Component
{
    public $users = [];
    public UserForm $form;
    public $modalTitle = 'Tambah User';
    public $isEditing = false;

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::orderBy('created_at', 'desc')->get();
    }

    public function openCreateModal()
    {
        $this->form->reset();
        $this->modalTitle = 'Tambah User';
        $this->isEditing = false;
        $this->dispatch('openModal');
    }

    public function openEditModal($id)
    {
        $user = User::findOrFail($id);
        $this->form->setUserData($user);
        $this->modalTitle = 'Edit User';
        $this->isEditing = true;
        $this->dispatch('openModal');
    }

    public function saveUser()
    {
        try {
            if ($this->isEditing) {
                $this->form->update();
                session()->flash('message', 'User berhasil diperbarui.');
            } else {
                $this->form->store();
                session()->flash('message', 'User berhasil ditambahkan.');
            }

            $this->loadUsers();
            $this->dispatch('closeModal');

            $this->dispatch('swal:success', [
                'title' => 'Berhasil!',
                'text' => session('message'),
                'icon' => 'success'
            ]);

            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Error menyimpan user: ' . $e->getMessage());

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->dispatch('swal:confirm-delete', $id);
    }

    #[On('deleteUser')]
    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            $this->loadUsers();

            $this->dispatch('swal:success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error menghapus user: ' . $e->getMessage());

            $this->dispatch('swal:error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
    
    #[Layout('components.layouts.app')]
    #[Title('Admin - Manage Users')]
    public function render()
    {
        return view('livewire.admin.manage-user');
    }
}
