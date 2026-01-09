<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterUser extends Model
{
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'divisi'
    ];
}
