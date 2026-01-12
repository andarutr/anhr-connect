<?php

namespace App\Livewire\Candidate;

use App\Models\JobPost;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use App\Livewire\Forms\PostApplyForm;

class PostApply extends Component
{
    use WithFileUploads;

    public PostApplyForm $form;

    #[Layout('components.layouts.candidate')]
    #[Title('Apply Lamaran Kamu')]
    public function render()
    {
        $data['posisi'] = JobPost::select('pekerjaan')
                                ->whereDate('close_post', '>=', now())
                                ->distinct()->get();

        return view('livewire.candidate.post-apply', $data);
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