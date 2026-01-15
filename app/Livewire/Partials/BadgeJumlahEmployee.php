<?php

namespace App\Livewire\Partials;

use App\Models\Employee;
use Livewire\Component;

class BadgeJumlahEmployee extends Component
{
    public function render()
    {
        $data['jumlah'] = Employee::where('status', 'active')->count();

        return view('livewire.partials.badge-jumlah-employee', $data);
    }
}
