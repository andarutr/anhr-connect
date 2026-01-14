<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    #[Layout('components.layouts.app')]
    #[Title('Selamat Datang Admin')]
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
