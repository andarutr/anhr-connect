<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    protected $table = 'resigns';

    protected $fillable = [
        'user_id',
        'file_pengajuan',
        'is_approve',
        'status',
    ];
}
