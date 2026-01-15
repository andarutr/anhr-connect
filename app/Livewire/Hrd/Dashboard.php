<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Dashboard extends Component
{
    public $stats = [];
    public $latestCandidates = [];
    public $chartData = [];

    public function mount()
    {
        $this->loadStats();
        $this->loadLatestCandidates();
        $this->loadChartData();
    }

    private function loadStats()
    {
        $this->stats = [
            'total' => Candidate::count(),
            'screening' => Candidate::where('status', 'screening')->count(),
            'interview_hrd' => Candidate::where('status', 'interview_hrd')->count(),
            'interview_user' => Candidate::where('status', 'interview_user')->count(),
            'psikotest' => Candidate::where('status', 'psikotest')->count(),
            'technical_test' => Candidate::where('status', 'technical_test')->count(),
            'mcu' => Candidate::where('status', 'mcu')->count(),
            'on_boarding' => Candidate::where('status', 'on_boarding')->count(),
            'hired' => Candidate::where('status', 'hired')->count(),
            'rejected' => Candidate::where('status', 'rejected')->count(),
        ];
    }

    private function loadLatestCandidates()
    {
        $this->latestCandidates = Candidate::latest()->limit(10)->get();
    }

    private function loadChartData()
    {
        $labels = [
            'Screening',
            'Interview HRD',
            'Interview User',
            'Psikotest',
            'Technical Test',
            'MCU',
            'On Boarding',
            'Hired',
            'Rejected'
        ];

        $data = [
            $this->stats['screening'],
            $this->stats['interview_hrd'],
            $this->stats['interview_user'],
            $this->stats['psikotest'],
            $this->stats['technical_test'],
            $this->stats['mcu'],
            $this->stats['on_boarding'],
            $this->stats['hired'],
            $this->stats['rejected']
        ];

        $colors = [
            'rgba(108, 117, 125, 0.7)', 
            'rgba(255, 193, 7, 0.7)',    
            'rgba(23, 162, 184, 0.7)',   
            'rgba(111, 66, 193, 0.7)',   
            'rgba(253, 126, 20, 0.7)',   
            'rgba(32, 201, 151, 0.7)',   
            'rgba(13, 202, 240, 0.7)',   
            'rgba(40, 167, 69, 0.7)',    
            'rgba(220, 53, 69, 0.7)'     
        ];

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Kandidat',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'borderColor' => array_map(fn($color) => str_replace('0.7', '1', $color), $colors),
                    'borderWidth' => 1
                ]
            ]
        ];
    }

    #[Layout('components.layouts.app')]
    #[Title('Selamat Datang HRD')]
    public function render()
    {
        return view('livewire.hrd.dashboard');
    }
}
