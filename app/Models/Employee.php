<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'position',
        'department',
        'hire_date',
        'hire_by',
        'status'
    ];
}
