<?php

namespace App\Livewire\Candidate;

use App\Models\JobPost;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class ListJob extends Component
{
    public $jobs = [];
    public $selectedJob = null;
    
    public function mount()
    {
        $this->jobs = JobPost::whereDate('close_post', '>=', now())->get();
    }

    public function closeModal()
    {
        $this->selectedJob = null;
    }

    public function showDetail($jobId)
    {
        $this->selectedJob = JobPost::find($jobId);
    }

    #[Layout('components.layouts.candidate')]
    #[Title('List Job Available')]
    public function render()
    {
        return view('livewire.candidate.list-job');
    }
}
