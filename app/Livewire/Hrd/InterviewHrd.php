<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\MasterUser;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class InterviewHrd extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $interviewUserDate = '';
    public $interviewUserUrl = '';
    public $selectedUser = ''; 
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
        $this->candidates = Candidate::where('status', 'interview_hrd')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function loadUsers()
    {
        $this->users = MasterUser::all();
    }

    public function confirmApprove($candidateId)
    {
        $this->candidateToApprove = $candidateId;
        $this->interviewUserDate = now()->addDay()->format('Y-m-d'); 
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->interviewUserDate || !$this->interviewUserUrl) {
            $this->dispatch('showErrorAlert', message: 'Tanggal interview, user terkait, dan url harus diisi');
            return;
        }
        
        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $candidate->update([
                'status' => 'interview_user',
                'date_interview_user' => $this->interviewUserDate,
                'url_interview_user' => $this->interviewUserUrl,
                'master_user_id' => $this->selectedUser
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil disetujui dan jadwal interview ditetapkan');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'interviewUserDate', 'interviewUserUrl', 'selectedUser']);
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
        $this->reset(['showApproveModal', 'candidateToApprove', 'interviewUserDate', 'interviewUserUrl', 'selectedUser']);
    }
    
    #[Layout('components.layouts.app')]
    #[Title('HRD - Interview HR')]
    public function render()
    {
        return view('livewire.hrd.interview-hrd');
    }
}
