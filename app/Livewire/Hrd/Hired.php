<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Hired extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;

    public function mount()
    {
        $this->loadCandidates();
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::where('status', 'hired')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function viewDetail($candidateId)
    {
        $this->selectedCandidate = Candidate::find($candidateId);
        if ($this->selectedCandidate) {
            $this->showDetailModal = true;
        }
    }

    public function closeDetailModal()
    {
        $this->showDetailModal = false;
        $this->selectedCandidate = null;
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Hired')]
    public function render()
    {
        return view('livewire.hrd.hired');
    }
}
