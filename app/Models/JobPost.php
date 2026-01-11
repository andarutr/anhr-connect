<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'pekerjaan',
        'divisi',
        'tipe_pekerjaan',
        'deskripsi_pekerjaan',
        'syarat',
        'benefit',
        'start_salary',
        'end_salary',
        'close_post',
        'nama_poster'
    ];
}
