<?php

namespace App\Livewire\Hrd;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Psikotest extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $technicalDate = '';
    public $technicalUrl = '';
    public $selectedChecker = ''; 
    public $users = [];
    public $minDate = '';

    public function mount()
    {
        $this->loadCandidates();
        $this->loadUsers();
        $this->minDate = now()->format('Y-m-d');
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::with('users')
            ->where('status', 'psikotest')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function loadUsers()
    {
        $this->users = User::all();
    }

    public function confirmApprove($candidateId)
    {
        $this->candidateToApprove = $candidateId;
        $this->technicalDate = now()->addDay()->format('Y-m-d'); 
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->technicalDate || !$this->technicalUrl) {
            $this->dispatch('showErrorAlert', message: 'Tanggal technical test, checker terkait, dan url harus diisi');
            return;
        }
        
        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $candidate->update([
                'status' => 'technical_test',
                'date_technical' => $this->technicalDate,
                'url_technical' => $this->technicalUrl,
                'checker_technical_id' => $this->selectedChecker
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil disetujui dan jadwal technical test ditetapkan');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'technicalDate', 'technicalUrl', 'selectedChecker']);
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
   
    public function cancelApprove()
    {
        $this->reset(['showApproveModal', 'candidateToApprove', 'technicalDate', 'technicalUrl', 'selectedChecker']);
    }
    
    #[Layout('components.layouts.app')]
    #[Title('HRD - Psikotest')]
    public function render()
    {
        return view('livewire.hrd.psikotest');
    }
}
