<?php

namespace App\Livewire\Hrd;

use App\Models\Employee as ModelsEmployee;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Employee extends Component
{
    public $employees = [];
    public $showEditModal = false;
    public $editingEmployeeId = null;
    public $department = '';

    public function mount()
    {
        $this->employees = ModelsEmployee::all();
    }

    public function editModal($employeeId)
    {
        $employee = ModelsEmployee::find($employeeId);
        
        if ($employee) {
            $this->editingEmployeeId = $employee->id;
            $this->department = $employee->department;
            $this->showEditModal = true;
        }
    }

    public function updateDepartment()
    {
        $this->validate([
            'department' => 'required|in:IT,HRD'
        ]);

        $employee = ModelsEmployee::find($this->editingEmployeeId);
        
        if ($employee) {
            $employee->update([
                'department' => $this->department
            ]);
        }

        $this->closeModal();
        $this->mount(); 
        $this->dispatch('showSuccessAlert', message: 'Department updated successfully');
    }

    public function closeModal()
    {
        $this->showEditModal = false;
        $this->editingEmployeeId = null;
        $this->department = '';
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Employee')]
    public function render()
    {
        return view('livewire.hrd.employee');
    }
}
