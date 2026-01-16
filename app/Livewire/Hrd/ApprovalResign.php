<?php

namespace App\Livewire\Hrd;

use App\Models\Resign;
use Livewire\Component;
use App\Models\Employee;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ApprovalResign extends Component
{
    public $resigns = [];

    public function mount()
    {
        $this->resigns = Resign::with('employee')->where('status', 'waiting')->get();
    }

    public function confirmApprove($id)
    {
        $this->dispatch('show-approve-confirmation', id: $id);
    }

    public function confirmReject($id)
    {
        $this->dispatch('show-reject-confirmation', id: $id);
    }

    public function approveResign($id)
    {
        DB::beginTransaction();

        try {
            $resign = Resign::findOrFail($id);
            
            $resign->update([
                'status' => 'approved',
                'is_approve' => 'y',
                'approve_by' => Auth::user()->name,
            ]);

            Employee::where('nik', $resign->employee->nik)->update([
                'resign_at' => now(),
                'status' => 'inactive',
            ]);

            DB::commit();

            $this->mount();

            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Pengajuan resign berhasil disetujui.'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menyetujui pengajuan resign: ' . $e->getMessage()
            ]);
        }
    }

    public function rejectResign($id)
    {
        DB::beginTransaction();

        try {
            $resign = Resign::findOrFail($id);
            
            $resign->update([
                'status' => 'rejected',
                'is_approve' => 'n',
                'reject_by' => Auth::user()->name,
            ]);

            Employee::where('nik', $resign->employee->nik)->update([
                'resign_at' => NULL,
                'status' => 'active',
            ]);

            DB::commit();

            $this->mount();

            $this->dispatch('alert', [
                'type' => 'success',
                'message' => 'Pengajuan resign berhasil ditolak.'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Terjadi kesalahan saat menolak pengajuan resign: ' . $e->getMessage()
            ]);
        }
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Approval Pengajuan Resign')]
    public function render()
    {
        return view('livewire.hrd.approval-resign');
    }
}
