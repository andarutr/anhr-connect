<?php

namespace App\Livewire\Partials;

use App\Models\Candidate;
use Livewire\Component;

class BadgeJumlahProses extends Component
{
    public $status;
    
    public function render()
    {
        $data['jumlah'] = Candidate::where('status', $this->status)->count();

        return view('livewire.partials.badge-jumlah-proses', $data);
    }
}
