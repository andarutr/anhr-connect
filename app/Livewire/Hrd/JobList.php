<?php

namespace App\Livewire\Hrd;

use App\Models\JobPost;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class JobList extends Component
{
    public $jobs = [];
    public $selectedJob = null;
    public $showModal = false;

    public function mount()
    {
        $this->jobs = JobPost::all();
    }

    public function viewDetail($jobId)
    {
        $this->selectedJob = JobPost::find($jobId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedJob = null;
    }

    #[Layout('components.layouts.app')]
    #[Title('HRD - Job Listing')]
    public function render()
    {
        return view('livewire.hrd.job-list');
    }
}
