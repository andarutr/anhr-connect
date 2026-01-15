<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class JobList extends Component
{
    #[Layout('components.layouts.app')]
    #[Title('HRD - Job Listing')]
    public function render()
    {
        return view('livewire.hrd.job-list');
    }
}
