<?php

namespace App\Livewire\Hrd;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\JobPostForm;
use Illuminate\Support\Facades\Log;

class JobPost extends Component
{
    public JobPostForm $form;

    #[Layout('components.layouts.app')]
    #[Title('HRD - Job Posting')]
    public function render()
    {
        return view('livewire.hrd.job-post');
    }

    public function store()
    {
        try {
           $this->form->store();

            session()->flash('message', 'Data berhasil disimpan.');

            return response()->json(['message' => 'Berhasil menambahkan data!']);
        } catch (\Exception $e) {
            Log::info('Terjadi kesalahan: ' . $e->getMessage());
            
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        } 
    }
}
