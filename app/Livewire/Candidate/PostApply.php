<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\PostApplyForm;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;

class PostApply extends Component
{
    use WithFileUploads;

    public PostApplyForm $form;

    #[Layout('components.layouts.candidate')]
    #[Title('Apply Lamaran Kamu')]
    public function render()
    {
        return view('livewire.candidate.post-apply');
    }

    public function store()
    {
        try {
           $no_apply = $this->form->store();

            session()->flash('message', 'Data berhasil disimpan.');

            return $this->redirect('/success-apply/'.$no_apply, navigate: true); 
        } catch (\Exception $e) {
            Log::info('Terjadi kesalahan: ' . $e->getMessage());
            
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        } 
    }
}