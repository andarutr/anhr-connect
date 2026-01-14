<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\MasterCompany;
use Livewire\Attributes\Title;
use App\Livewire\Forms\McuForm;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;

class ManageCompanyMcu extends Component
{
    public $mcus = [];
    public McuForm $form;
    public $modalTitle = 'Tambah MCU';
    public $isEditing = false;

    public function mount()
    {
        $this->loadMcus();
    }

    public function loadMcus()
    {
        $this->mcus = MasterCompany::orderBy('created_at', 'desc')->get();
    }

    public function openCreateModal()
    {
        $this->form->reset();
        $this->modalTitle = 'Tambah MCU';
        $this->isEditing = false;
        $this->dispatch('openModal');
    }

    public function openEditModal($id)
    {
        $mcu = MasterCompany::findOrFail($id);
        $this->form->setMcuData($mcu);
        $this->modalTitle = 'Edit MCU';
        $this->isEditing = true;
        $this->dispatch('openModal');
    }

    public function saveMcu()
    {
        try {
            if ($this->isEditing) {
                $this->form->update();
                session()->flash('message', 'MCU berhasil diperbarui.');
            } else {
                $this->form->store();
                session()->flash('message', 'MCU berhasil ditambahkan.');
            }

            $this->loadMcus();
            $this->dispatch('closeModal');

            $this->dispatch('swal:success', session('message'));

            $this->form->reset();
        } catch (\Exception $e) {
            Log::error('Error menyimpan MCU: ' . $e->getMessage());

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function confirmDelete($id)
    {
        $this->dispatch('swal:confirm-delete', $id);
    }

    #[On('deleteMcu')] 
    public function deleteMcu($id)
    {
        try {
            MasterCompany::where('id', $id)->delete();
            $this->loadMcus();

            $this->dispatch('swal:success', 'MCU berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error menghapus MCU: ' . $e->getMessage());

            $this->dispatch('swal:error', 'Gagal menghapus MCU: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('Admin - Manage Company MCU')]
    public function render()
    {
        return view('livewire.admin.manage-company-mcu');
    }
}
