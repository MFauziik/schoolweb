<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['nip', 'nama', 'jabatan', 'no_hp', 'email', 'alamat', 'is_active'];
}