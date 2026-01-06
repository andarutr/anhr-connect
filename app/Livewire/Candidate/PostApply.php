<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class PostApply extends Component
{
    use WithFileUploads;

    public $posisi_dilamar = '';
    public $nama_lengkap = '';
    public $nama_panggilan = '';
    public $umur = '';
    public $alamat_rumah = '';
    public $rt = '';
    public $rw = '';
    public $kelurahan = '';
    public $kecamatan = '';
    public $no_ktp = '';
    public $no_kk = '';
    public $email = '';
    public $cv_terbaru = '';
    public $skck_terbaru = '';
    public $ket_sehat_terbaru = '';

    #[Layout('components.layouts.candidate')]
    public function render()
    {
        return view('livewire.candidate.post-apply');
    }

    private function generateNoApply()
    {
        $today = now()->format('Ymd'); 
        $count = Candidate::where('no_apply', 'LIKE', $today . '%')->count();
        $increment = str_pad($count + 1, 4, '0', STR_PAD_LEFT);

        return $today . $increment;
    }

    public function store()
    {
        $validated = $this->validate([
            'posisi_dilamar' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'umur' => 'required|integer|min:17|max:65',
            'alamat_rumah' => 'required|string|max:500',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'no_ktp' => 'required|numeric|unique:candidates,no_ktp',
            'no_kk' => 'required|numeric',
            'email' => 'required|email|max:255|unique:candidates,email',
            'cv_terbaru' => 'required|file|mimes:pdf,doc,docx|max:2048', 
            'skck_terbaru' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'ket_sehat_terbaru' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $cvPath = $this->cv_terbaru->store('files', 'public');
        $skckPath = $this->skck_terbaru->store('files', 'public');
        $healthCertPath = $this->ket_sehat_terbaru->store('files', 'public');

        Candidate::create([
            'no_apply' => $this->generateNoApply(),
            'posisi_dilamar' => $validated['posisi_dilamar'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'nama_panggilan' => $validated['nama_panggilan'],
            'umur' => (int)$validated['umur'],
            'alamat_rumah' => $validated['alamat_rumah'],
            'rt' => $validated['rt'],
            'rw' => $validated['rw'],
            'kelurahan' => $validated['kelurahan'],
            'kecamatan' => $validated['kecamatan'],
            'no_ktp' => $validated['no_ktp'],
            'no_kk' => $validated['no_kk'],
            'email' => $validated['email'],
            'cv_terbaru' => $cvPath,
            'skck_terbaru' => $skckPath,
            'ket_sehat_terbaru' => $healthCertPath,
            'status' => 'applied'
        ]);

        session()->flash('message', 'Data berhasil disimpan.');

        return $this->redirect('/success-apply', navigate: true); 
    }
}