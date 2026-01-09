<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Screening extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $interviewHrdDate = '';
    public $interviewHrdUrl = '';
    public $minDate = '';

    public function mount()
    {
        $this->loadCandidates();
        $this->minDate = now()->format('Y-m-d');
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::where('status', 'screening')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function confirmApprove($candidateId)
    {
        $this->candidateToApprove = $candidateId;
        $this->interviewHrdDate = now()->addDay()->format('Y-m-d'); 
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->interviewHrdDate || !$this->interviewHrdUrl) {
            $this->dispatch('showErrorAlert', message: 'Tanggal interview dan url harus diisi');
            return;
        }
        
        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $candidate->update([
                'status' => 'interview_hrd',
                'date_interview_hrd' => $this->interviewHrdDate,
                'url_interview_hrd' => $this->interviewHrdUrl
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil disetujui dan jadwal interview ditetapkan');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'interviewHrdDate', 'interviewHrdUrl']);
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
        $this->reset(['showApproveModal', 'candidateToApprove', 'interviewHrdDate', 'interviewHrdUrl']);
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Screening')]
    public function render()
    {
        return view('livewire.hrd.screening');
    }
}
