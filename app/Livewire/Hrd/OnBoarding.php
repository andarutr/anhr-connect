<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class OnBoarding extends Component
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
        $this->candidates = Candidate::where('status', 'on_boarding')
            ->orderBy('created_at', 'desc')
            ->get();
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
        try {
            DB::transaction(function () use ($candidateId) {
                $candidate = Candidate::find($candidateId);
                if ($candidate) {
                    $candidate->update([
                        'status' => 'hired',
                        'hire_date' => now(),
                        'hire_by' => Auth::user()->name
                    ]);
                    
                    Employee::create([
                        'nama_lengkap' => $candidate->nama_lengkap,
                        'email' => $candidate->email,
                        'position' => $candidate->posisi_dilamar,
                        'hire_date' => now(),
                        'hire_by' => Auth::user()->name,
                        'status' => 'active'
                    ]);

                    $this->loadCandidates();
                    $this->dispatch('showSuccessAlert', message: 'Candidate berhasil dihire');
                }
            });
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch('showErrorAlert', message: 'Gagal menghire candidate: ' . $e->getMessage());
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
    #[Title('HRD - On Boarding')]
    public function render()
    {
        return view('livewire.hrd.on-boarding');
    }
}
