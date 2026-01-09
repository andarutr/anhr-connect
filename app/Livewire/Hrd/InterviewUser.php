<?php

namespace App\Livewire\Hrd;

use App\Models\User;
use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class InterviewUser extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $psikotestDate = '';
    public $psikotestUrl = '';
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
        $this->candidates = Candidate::where('status', 'interview_user')
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
        $this->psikotestDate = now()->addDay()->format('Y-m-d'); 
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->psikotestDate || !$this->psikotestUrl) {
            $this->dispatch('showErrorAlert', message: 'Tanggal psikotest, checker terkait, dan url gform harus diisi');
            return;
        }
        
        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $candidate->update([
                'status' => 'psikotest',
                'date_psikotest' => $this->psikotestDate,
                'url_psikotest' => $this->psikotestUrl,
                'master_checker_id' => $this->selectedChecker
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil disetujui dan jadwal psikotest ditetapkan');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'psikotestDate', 'psikotestUrl', 'selectedChecker']);
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
        $this->reset(['showApproveModal', 'candidateToApprove', 'psikotestDate', 'psikotestUrl', 'selectedChecker']);
    }
    
    #[Layout('components.layouts.app')]
    #[Title('HRD - Interview User')]
    public function render()
    {
        return view('livewire.hrd.interview-user');
    }
}
