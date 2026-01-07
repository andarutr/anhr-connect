<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    #[Layout('components.layouts.app')]
    #[Title('Selamat Datang HRD')]
    public function render()
    {
        return view('livewire.hrd.dashboard');
    }
}
