<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MasterUser;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use App\Livewire\Forms\MasterUserForm;

class ManageUserInterview extends Component
{
    public $users = [];
    public MasterUserForm $form;
    public $modalTitle = 'Tambah Master User';
    public $isEditing = false;

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = MasterUser::orderBy('created_at', 'desc')->get();
    }

    public function openCreateModal()
    {
        $this->form->reset();
        $this->modalTitle = 'Tambah Master User';
        $this->isEditing = false;
        $this->dispatch('openModal');
    }

    public function openEditModal($id)
    {
        $user = MasterUser::findOrFail($id);
        $this->form->setMasterUserData($user);
        $this->modalTitle = 'Edit Master User';
        $this->isEditing = true;
        $this->dispatch('openModal');
    }

    public function saveUser()
    {
        try {
            if ($this->isEditing) {
                $this->form->update();
                session()->flash('message', 'Master User berhasil diperbarui.');
            } else {
                $this->form->store();
                session()->flash('message', 'Master User berhasil ditambahkan.');
            }

            $this->loadUsers();
            $this->dispatch('closeModal');

            $this->dispatch('swal:success', session('message'));

            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Error menyimpan Master User: ' . $e->getMessage());

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->dispatch('swal:confirm-delete', $id);
    }

    #[On('deleteMasterUser')]
    public function deleteMasterUser($id)
    {
        try {
            MasterUser::findOrFail($id)->delete();
            $this->loadUsers();

            $this->dispatch('swal:success', 'Master User berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error menghapus Master User: ' . $e->getMessage());

            $this->dispatch('swal:error', 'Gagal menghapus Master User: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('Admin - Manage Interview User')]
    public function render()
    {
        return view('livewire.admin.manage-user-interview');
    }
}
