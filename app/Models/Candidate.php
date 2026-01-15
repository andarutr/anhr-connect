<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'posisi_dilamar',
        'nama_lengkap',
        'nama_panggilan',
        'umur',
        'domisili',
        'alamat_rumah',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'no_ktp',
        'no_kk',
        'email',
        'pendidikan_terakhir',
        'universitas',
        'cv_terbaru',
        'skck_terbaru',
        'ket_sehat_terbaru',
        'no_apply',
        'status',
        'date_interview_hrd',
        'url_interview_hrd',
        'date_interview_user',
        'url_interview_user',
        'master_user_id',
        'date_psikotest',
        'url_psikotest',
        'date_technical',
        'url_technical',
        'checker_technical_id',
        'master_checker_id',
        'ekspektasi_gaji',
        'date_mcu',
        'company_id',
        'hasil_mcu',
        'hire_date',
        'hire_by'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'master_user_id');
    }

    public function company()
    {
        return $this->belongsTo(MasterCompany::class, 'company_id');
    }
}
