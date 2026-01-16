<?php

namespace App\Livewire\Hrd;

use Carbon\Carbon;
use App\Models\Resign;
use Livewire\Component;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;

class NoticePeriodResign extends Component
{
    public $resigns = [];

    public function mount()
    {
        $this->resigns = Resign::with('employee')->whereIn('status', ['approved','done'])->get();
    }

    public function downloadPaklaring($id)
    {
        $resign = Resign::with('employee')->findOrFail($id);
        $employee = $resign->employee;

        $lastDay = Carbon::parse($employee->resign_at)->addDays(30);
        $now = Carbon::now();

        if ($now->lt($lastDay)) {
            $this->dispatch('alert', [
                'type' => 'error',
                'message' => 'Paklaring hanya bisa di-download setelah tanggal ' . $lastDay->format('d M Y')
            ]);
            return;
        }

        $resign->update(['status' => 'done']);

        $lastDay = Carbon::parse($employee->resign_at)->addDays(30);

        $data = [
            'employee' => $employee,
            'resign' => $resign,
            'lastDay' => $lastDay,
            'today' => Carbon::now(),
        ];

        $pdf = Pdf::loadView('pdf.paklaring', $data)
                  ->setPaper('a4', 'portrait');

        return response()->streamDownload(
            fn() => print($pdf->output()),
            'paklaring_' . $employee->nik . '_' . date('Ymd') . '.pdf'
        );
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Notice Period')]
    public function render()
    {
        return view('livewire.hrd.notice-period-resign');
    }
}
