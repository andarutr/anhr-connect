<?php

namespace App\Livewire\Forms;

use App\Models\MasterUser;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MasterUserForm extends Form
{
    public $id = null;

    #[Validate('required|string|max:255')]
    public $nik = '';

    #[Validate('required|string|max:255')]
    public $nama_lengkap = '';

    #[Validate('required|string|max:255')]
    public $divisi = '';

    public function setMasterUserData(MasterUser $user)
    {
        $this->id = $user->id;
        $this->nik = $user->nik;
        $this->nama_lengkap = $user->nama_lengkap;
        $this->divisi = $user->divisi;
    }

    public function store()
    {
        $this->validate();

        MasterUser::create([
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'divisi' => $this->divisi,
        ]);
    }

    public function update()
    {
        $this->validate();

        $user = MasterUser::findOrFail($this->id);
        $user->update([
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'divisi' => $this->divisi,
        ]);
    }
}