<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['foto', 'nisn', 'nama', 'kelas', 'jurusan', 'tanggal_lahir', 'angkatan', 'is_active'];
}