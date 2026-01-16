<?php

namespace App\Livewire\Partials;

use App\Models\Resign;
use Livewire\Component;

class BadgeJumlahResign extends Component
{
    public $status;

    public function render()
    {
        $data['jumlah'] = Resign::where('status', $this->status)->count();

        return view('livewire.partials.badge-jumlah-resign', $data);
    }
}
