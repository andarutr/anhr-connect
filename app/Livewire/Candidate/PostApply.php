<?php

namespace App\Livewire\Candidate;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\PostApplyForm;

class PostApply extends Component
{
    use WithFileUploads;

    public PostApplyForm $form;

    #[Layout('components.layouts.candidate')]
    public function render()
    {
        return view('livewire.candidate.post-apply')
                ->layoutData(['title' => 'Apply Lamaran Kamu']);
    }

    public function store()
    {
        try {
            $this->form->store();

            session()->flash('message', 'Data berhasil disimpan.');

            return $this->redirect('/success-apply', navigate: true); 
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        } 
    }
}