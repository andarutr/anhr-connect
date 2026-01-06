<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use App\Models\Candidate;
use Livewire\Attributes\Layout;

class TrackApply extends Component
{
    public $no_apply = '';
    public $candidate = null;
    public $notFound = false;

    #[Layout('components.layouts.candidate')]
    public function render()
    {
        return view('livewire.candidate.track-apply');
    }

    public function search()
    {
        $this->reset(['candidate', 'notFound']);

        $candidate = Candidate::where('no_apply', $this->no_apply)->first();

        if ($candidate) {
            $this->candidate = $candidate;
        } else {
            $this->notFound = true;
        }
    }
}
