<?php
// app/Models/Borrowing.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'inventory_id',
        'peminjam_nama', 
        'peminjam_kelas',
        'keperluan',
        'status_peminjaman' // ganti dari 'status'
    ];

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }
}