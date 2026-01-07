<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Candidate;
use Livewire\Attributes\Validate;

class PostApplyForm extends Form
{
    #[Validate('required|string|max:255')]
    public $posisi_dilamar = '';

    #[Validate('required|string|max:255')]
    public $nama_lengkap = '';
    
    #[Validate('required|string|max:255')]
    public $nama_panggilan = '';
    
    #[Validate('required|integer|min:17|max:65')]
    public $umur = '';
    
    #[Validate('required|string|max:500')]
    public $alamat_rumah = '';
    
    #[Validate('required|string|max:10')]
    public $rt = '';
    
    #[Validate('required|string|max:10')]
    public $rw = '';
    
    #[Validate('required|string|max:255')]
    public $kelurahan = '';
    
    #[Validate('required|string|max:255')]
    public $kecamatan = '';
    
    #[Validate('required|numeric|unique:candidates,no_ktp')]
    public $no_ktp = '';
    
    #[Validate('required|numeric')]
    public $no_kk = '';
    
    #[Validate('required|email|max:255|unique:candidates,email')]
    public $email = '';
    
    #[Validate('required|file|mimes:pdf,doc,docx|max:2048')]
    public $cv_terbaru = '';
    
    #[Validate('required|file|mimes:pdf,doc,docx|max:2048')]
    public $skck_terbaru = '';
    
    #[Validate('required|file|mimes:pdf,doc,docx|max:2048')]
    public $ket_sehat_terbaru = '';

    private function generateNoApply()
    {
        $today = now()->format('Ymd'); 
        $count = Candidate::where('no_apply', 'LIKE', $today . '%')->count();
        $increment = str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        return $today . $increment;
    }

    public function store()
    {
        $this->validate();

        $cvPath = $this->cv_terbaru->store('files', 'public');
        $skckPath = $this->skck_terbaru->store('files', 'public');
        $healthCertPath = $this->ket_sehat_terbaru->store('files', 'public');

        Candidate::create([
            'no_apply' => $this->generateNoApply(),
            'posisi_dilamar' => $this->posisi_dilamar,
            'nama_lengkap' => $this->nama_lengkap,
            'nama_panggilan' => $this->nama_panggilan,
            'umur' => (int)$this->umur,
            'alamat_rumah' => $this->alamat_rumah,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'kelurahan' => $this->kelurahan,
            'kecamatan' => $this->kecamatan,
            'no_ktp' => $this->no_ktp,
            'no_kk' => $this->no_kk,
            'email' => $this->email,
            'cv_terbaru' => $cvPath,
            'skck_terbaru' => $skckPath,
            'ket_sehat_terbaru' => $healthCertPath,
            'status' => 'applied'
        ]);
    }
}
