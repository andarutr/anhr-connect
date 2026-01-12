<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use App\Models\MasterCompany;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class TechnicalTest extends Component
{
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $mcuDate = '';
    public $selectedCompany = ''; 
    public $companies = [];
    public $minDate = '';

    public function mount()
    {
        $this->loadCandidates();
        $this->loadCompany();
        $this->minDate = now()->format('Y-m-d');
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::where('status', 'technical_test')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function loadCompany()
    {
        $this->companies = MasterCompany::all();
    }

    public function confirmApprove($candidateId)
    {
        $this->candidateToApprove = $candidateId;
        $this->mcuDate = now()->addDay()->format('Y-m-d'); 
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->mcuDate) {
            $this->dispatch('showErrorAlert', message: 'Tanggal MCU, dan pilihan perusahaan harus diisi');
            return;
        }
        
        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $candidate->update([
                'status' => 'mcu',
                'date_mcu' => $this->mcuDate,
                'company_id' => $this->selectedCompany
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'Candidate berhasil disetujui dan jadwal MCU ditetapkan');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'mcuDate', 'selectedCompany']);
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
        $this->reset(['showApproveModal', 'candidateToApprove', 'mcuDate', 'selectedCompany']);
    }
    
    #[Layout('components.layouts.app')]
    #[Title('HRD - Technical Test')]
    public function render()
    {
        return view('livewire.hrd.technical-test');
    }
}
