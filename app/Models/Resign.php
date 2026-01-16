<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    protected $table = 'resigns';

    protected $fillable = [
        'employee_id',
        'file_pengajuan',
        'file_paklaring',
        'is_approve',
        'status',
        'approve_by',
        'reject_by',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
