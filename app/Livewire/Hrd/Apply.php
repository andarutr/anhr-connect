<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Redis;

class Apply extends Component
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
        $cacheKey = 'candidates_applied';
        $cachedData = Redis::get($cacheKey);
        
        if ($cachedData) {
            $this->candidates = json_decode($cachedData, false);
        } else {
            $dbCandidates = Candidate::where('status', 'applied')
                ->orderBy('created_at', 'desc')
                ->get()
                ->toArray();
            
            $this->candidates = $dbCandidates;
            
            Redis::setex($cacheKey, 300, json_encode($dbCandidates));
        }
    }

    public function confirmApprove($candidateId)
    {
        $this->dispatch('showApproveConfirm', candidateId: $candidateId);
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate($candidateId)
    {
        $candidate = Candidate::find($candidateId);
        if ($candidate) {
            $candidate->update(['status' => 'screening']);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil dipindahkan ke screening');
        }
    }

    public function rejectCandidate($candidateId)
    {
        $candidate = Candidate::find($candidateId);
        if ($candidate) {
            $candidate->update(['status' => 'rejected']);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil ditolak');
        }
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
    #[Title('HRD - Candidate Apply')]
    public function render()
    {
        return view('livewire.hrd.apply');
    }
}
