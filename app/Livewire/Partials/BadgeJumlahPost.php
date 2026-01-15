<?php

namespace App\Livewire\Partials;

use App\Models\JobPost;
use Livewire\Component;

class BadgeJumlahPost extends Component
{
    public function render()
    {
        $data['jumlah'] = JobPost::whereDate('close_post', '>=', now())->count();

        return view('livewire.partials.badge-jumlah-post', $data);
    }
}
