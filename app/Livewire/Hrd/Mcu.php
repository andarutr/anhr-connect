<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Mcu extends Component
{
    use WithFileUploads;
    
    public $candidates = [];
    public $selectedCandidate = null;
    public $showDetailModal = false;
    public $showApproveModal = false;
    public $candidateToApprove = null;
    public $mcuFile = '';
    public $minDate = '';

    public function mount()
    {
        $this->loadCandidates();
        $this->minDate = now()->format('Y-m-d');
    }

    public function loadCandidates()
    {
        $this->candidates = Candidate::with('company')
            ->where('status', 'mcu')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function confirmApprove($candidateId)
    {
        $this->candidateToApprove = $candidateId;
        $this->showApproveModal = true;
    }

    public function confirmReject($candidateId)
    {
        $this->dispatch('showRejectConfirm', candidateId: $candidateId);
    }

    public function approveCandidate()
    {
        if (!$this->candidateToApprove || !$this->mcuFile) {
            $this->dispatch('showErrorAlert', message: 'File MCU harus diupload');
            return;
        }
        
        $this->validate([
            'mcuFile' => 'required|mimes:pdf,jpg,jpeg,png|max:10240' 
        ]);

        $candidate = Candidate::find($this->candidateToApprove);
        if ($candidate) {
            $path = $this->mcuFile->store('mcu', 'public');

            $candidate->update([
                'status' => 'on_boarding',
                'hasil_mcu' => $path 
            ]);
            $this->loadCandidates();
            $this->dispatch('showSuccessAlert', message: 'File MCU candidate berhasil disetujui');
        }
        $this->reset(['showApproveModal', 'candidateToApprove', 'mcuFile']);
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
        $this->reset(['showApproveModal', 'candidateToApprove', 'mcuFile']);
    }
    
    #[Layout('components.layouts.app')]
    #[Title('HRD - MCU')]
    public function render()
    {
        return view('livewire.hrd.mcu');
    }
}
