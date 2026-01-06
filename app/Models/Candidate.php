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
        'alamat_rumah',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'no_ktp',
        'no_kk',
        'email',
        'cv_terbaru',
        'skck_terbaru',
        'ket_sehat_terbaru',
    ];
}
