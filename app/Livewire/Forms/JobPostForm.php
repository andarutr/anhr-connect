<?php

namespace App\Livewire\Forms;

use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class JobPostForm extends Form
{
    #[Validate('required')]
    public $pekerjaan = '';

    #[Validate('required')]
    public $divisi = '';

    #[Validate('required')]
    public $tipe_pekerjaan = '';

    #[Validate('required')]
    public $deskripsi_pekerjaan = '';

    #[Validate('required')]
    public $syarat = '';

    #[Validate('required')]
    public $benefit = '';

    #[Validate('required|numeric|min:0')]
    public $start_salary = '';

    #[Validate('required|numeric|min:0|gte:start_salary')]
    public $end_salary = '';

    #[Validate('required|date|after_or_equal:today')]
    public $close_post = '';

    public function store()
    {
        $this->validate();

        JobPost::create([
            'pekerjaan' => $this->pekerjaan,
            'divisi' => $this->divisi,
            'tipe_pekerjaan' => $this->tipe_pekerjaan,
            'deskripsi_pekerjaan' => $this->deskripsi_pekerjaan,
            'syarat' => $this->syarat,
            'benefit' => $this->benefit,
            'start_salary' => $this->start_salary,
            'end_salary' => $this->end_salary,
            'close_post' => $this->close_post,
            'nama_poster' => Auth::user()->name
        ]);

        return redirect('/hrd/job-listing');
    }
}
