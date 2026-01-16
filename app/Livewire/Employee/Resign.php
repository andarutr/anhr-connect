<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Resign as ModelsResign;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Resign extends Component
{
    use WithFileUploads;

    use WithFileUploads;

    public $nik;
    public $employee;
    public $resignFile;
    public $isEmployeeFound = false;

    protected $rules = [
        'nik' => 'required|exists:employees,nik',
        'resignFile' => 'required|file|mimes:pdf|max:10240',
    ];

    protected $messages = [
        'nik.required' => 'NIK wajib diisi.',
        'nik.exists' => 'NIK tidak ditemukan dalam sistem.',
        'resignFile.required' => 'File pengajuan resign wajib diunggah.',
        'resignFile.mimes' => 'File harus berupa PDF.',
        'resignFile.max' => 'Ukuran file maksimal 10MB.',
    ];

    public function searchEmployee()
    {
        $this->validateOnly('nik');

        $this->employee = Employee::where('nik', $this->nik)->first();

        if ($this->employee) {
            $this->isEmployeeFound = true;
        } else {
            $this->addError('nik', 'NIK tidak ditemukan dalam sistem.');
        }
    }

    public function submit()
    {
        $this->validateOnly('resignFile');

        $fileName = 'resign_' . $this->employee->id . '_' . Str::random(10) . '.pdf';
        $filePath = $this->resignFile->store('resigns', 'public');

        ModelsResign::create([
            'user_id' => $this->employee->id,
            'file_pengajuan' => $filePath,
            'status' => 'waiting',
        ]);

        session()->flash('message', 'Pengajuan resign berhasil dikirim.');

        $this->reset(['nik', 'resignFile', 'isEmployeeFound', 'employee']);
    }

    #[Layout('components.layouts.candidate')]
    #[Title('Pengajuan Resign Karyawan')]
    public function render()
    {
        return view('livewire.employee.resign');
    }
}
